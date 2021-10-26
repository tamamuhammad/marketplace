<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\FotoModel;
use App\Models\LikeModel;
use App\Models\CommentModel;
use App\Models\RatingModel;
use CodeIgniter\I18n\Time;

class Produk extends BaseController
{
	protected $produks, $kategori, $foto, $likes, $comments, $ratings;

	public function __construct()
	{
		$this->produks = new ProdukModel();
		$this->kategori = new KategoriModel();
		$this->foto = new FotoModel();
		$this->likes = new LikeModel();
		$this->comments = new CommentModel();
		$this->ratings = new RatingModel();
	}

	public function index()
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'List Semua Produk';
		if (!session()->has('keyword')) {
			if ($this->request->getVar('keyword')) {
				session()->set('keyword', $this->request->getVar('keyword'));
				$data['produk'] = $this->produks->getProduk(null, $this->request->getVar('keyword'));
			} else {
				$data['produk']	= $this->produks->getProduk();
			}
		} else {
			if ($this->request->getVar('die')) {
				session()->remove('keyword');
				$data['produk']	= $this->produks->getProduk();
			} else {
				$data['produk'] = $this->produks->getProduk(null, session()->get('keyword'));
			}
		}
		$data['kategori'] = $this->kategori->getKategori();
		$data['pager'] = $this->produks->pager;
		$data['sorting'] = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;

		return view('dashboard/produk', $data);
	}

	public function show($id)
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['produk'] = $this->produks->getProduk($id);
		$data['kategori'] = $this->kategori->getKategori($data['produk']['kategori']);
		$data['foto'] = $this->foto->getFoto($data['produk']['id']);
		$data['title'] = $data['produk']['nama'];
		$data['likes'] = $this->likes->countLike($id);
		$data['comments'] = count($this->comments->getComment($id));
		$ratings = $this->ratings->getRating($id);
		$i = 0;
		if ($ratings) {
			foreach ($ratings as $r) {
				$i = $i + $r['rating'];
			}
			$data['ratings'] = $i / count($ratings);
		} else {
			$data['ratings'] = 0;
		}

		return view('dashboard/detail', $data);
	}

	public function create()
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'Tambah Produk';
		$data['validation'] = \Config\Services::validation();
		$data['kategori'] = $this->kategori->getKategori();

		return view('dashboard/create', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'nama' 		=> 'required',
			'stok' 		=> 'required|numeric',
			'harga'		=> 'required|numeric',
			'foto'		=> 'mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]'
		])) {
			return redirect()->to('/produk/create')->withInput();
		}

		$this->produks->save([
			'nama' => $this->request->getVar('nama'),
			'kategori' => $this->request->getVar('kategori'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'stok' => $this->request->getVar('stok'),
			'harga' => $this->request->getVar('harga'),
			'promosi' => $this->request->getVar('promosi'),
			'penawaran' => $this->request->getVar('penawaran'),
			'popularitas' => 0,
			'created_at' => Time::now(),
			'updated_at' => Time::now()
		]);

		$gambar = $this->request->getFile('foto');
		if ($gambar->getError() == 4) {
			$namaGambar = 'default.jpg';
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('img', $namaGambar);
		}

		$idproduk = $this->produks->orderBy('created_at', 'DESC')->first()['id'];

		$this->foto->save([
			'id_produk' => $idproduk,
			'foto' => $namaGambar
		]);

		session()->setFlashdata('true', 'Produk berhasil ditambahkan');
		return redirect()->to('/produk');
	}

	public function edit($id)
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'Edit Produk';
		$data['validation'] = \Config\Services::validation();
		$data['produk'] = $this->produks->getProduk($id);
		$data['kategori'] = $this->kategori->getKategori();
		$data['foto'] = $this->foto->getFoto($data['produk']['id']);

		return view('dashboard/edit', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'nama' 		=> 'required',
			'stok' 		=> 'required|numeric',
			'harga'		=> 'required|numeric',
		])) {
			return redirect()->to('/produk/e/' . $id)->withInput();
		}

		$this->produks->save([
			'id'			=> $id,
			'nama'			=> $this->request->getVar('nama'),
			'kategori'		=> $this->request->getVar('kategori'),
			'deskripsi' 	=> $this->request->getVar('deskripsi'),
			'stok'			=> $this->request->getVar('stok'),
			'harga' 		=> $this->request->getVar('harga'),
			'promosi' 		=> $this->request->getVar('promosi'),
			'penawaran' 		=> $this->request->getVar('penawaran'),
			'updated_at' 	=> Time::now()
		]);

		session()->setFlashdata('true', 'Produk berhasil diubah');
		return redirect()->to('/produk');
	}

	public function delete($id)
	{
		$this->produks->delete($id);

		session()->setFlashdata('true', 'Data berhasil dihapus');

		return redirect()->to('/produk');
	}

	public function foto()
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		if (!$this->validate([
			'foto'	=> 'mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]'
		])) {
			return redirect()->to('/produk/e/' . $this->request->getVar('id'))->withInput();
		}

		$idp = $this->request->getVar('id');

		foreach ($this->foto->getFoto($idp) as $f) {
			if ($f['foto'] == 'default.jpg') {
				$this->foto->where('id_produk', $idp)->delete();
			}
		}

		$gambar = $this->request->getFile('foto');
		$namaGambar = $gambar->getRandomName();
		$gambar->move('img', $namaGambar);

		$this->foto->save([
			'id_produk' => $idp,
			'foto' => $namaGambar
		]);
		return redirect()->to('/produk/e/' . $this->request->getVar('id'));
	}

	public function deleteFoto($id)
	{
		$foto = $this->foto->where('id', $id)->first();
		$idp = $foto['id_produk'];
		unlink('img/' . $foto['foto']);
		$this->foto->delete($id);
		return redirect()->to('/produk/e/' . $idp);
	}

	public function deleteComment($id)
	{
		$komen = $this->comments->where('id', $id)->first();
		$this->comments->delete($id);
		return redirect()->to('/produk/c/' . $komen['id_produk']);
	}

	public function comments($id)
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'Komentar Produk';
		$data['produk'] = $this->produks->getProduk($id);
		$data['comments'] = $this->comments->getComment($id);
		$data['pager'] = $this->comments->pager;
		$data['validation'] = \Config\Services::validation();

		return view('dashboard/komentar', $data);
	}

	public function rating($id)
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'Rating Produk';
		$data['produk'] = $this->produks->getProduk($id);
		$data['rating'] = count($this->ratings->getRating($id));
		$data['rating1'] = count($this->ratings->getRating($id, 1));
		$data['rating2'] = count($this->ratings->getRating($id, 2));
		$data['rating3'] = count($this->ratings->getRating($id, 3));
		$data['rating4'] = count($this->ratings->getRating($id, 4));
		$data['rating5'] = count($this->ratings->getRating($id, 5));

		return view('dashboard/rating', $data);
	}

	public function comment($id)
	{
		if (!$this->validate([
			'komentar' 	=> 'required',
			'foto'		=> 'mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]'
		])) {
			return redirect()->to('/produk/c/' . $id)->withInput();
		}

		$gambar = $this->request->getFile('foto');
		if ($gambar->getError() == 4) {
			$namaGambar = null;
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('img/komentar', $namaGambar);
		}

		$this->comments->save([
			'username' 	=> 'Admin',
			'id_produk' => $id,
			'komentar' => $this->request->getVar('komentar'),
			'foto'	=> $namaGambar,
			'cookie'	=> 'adminofficial123',
			'created_at'	=> Time::now(),
			'updated_at'	=> Time::now()
		]);

		session()->setFlashdata('true', 'Anda berhasil berkomentar');
		return redirect()->to('/produk/c/' . $id);
	}
}
