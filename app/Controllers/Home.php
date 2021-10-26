<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\FotoModel;
use App\Models\LikeModel;
use App\Models\CommentModel;
use App\Models\RatingModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{

	protected $produks, $kategori, $foto, $likes, $comments, $ratings;
	protected $adminEmail = 'umarsyarief67@gmail.com';

	public function __construct()
	{
		if (!isset($_COOKIE['token'])) {
			setcookie('token', md5(random_bytes(16)), time() + 315360000);
		}
		$this->produks = new ProdukModel();
		$this->kategori = new KategoriModel();
		$this->foto = new FotoModel();
		$this->likes = new LikeModel();
		$this->comments = new CommentModel();
		$this->ratings = new RatingModel();
		$this->users = new UserModel();
	}

	public function index()
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['title'] = 'Beranda';
		$data['halaman'] = false;
		$data['produk'] = $this->produks->bestProduk();
		$data['category'] = $this->kategori->getKategori();
		$data['promosi'] = $this->produks->promotion();
		$ratings = $this->ratings->getRating(1111111111);
		$i = 0;
		if ($ratings) {
			foreach ($ratings as $r) {
				$i = $i + $r['rating'];
			}
			$data['rating'] = $i / count($ratings);
		} else {
			$data['rating'] = 0;
		}
		$data['foto'] = [];
		$data['foto2'] = [];

		foreach ($data['produk'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto'], $foto);
		}
		foreach ($data['promosi'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto2'], $foto);
		}

		// dd($data);
		return view('home/index', $data);
	}

	public function show($id)
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['produk'] = $this->produks->getProduk($id);

		$this->produks->save([
			'id' => $id,
			'popularitas' => $data['produk']['popularitas'] + 1,
			'updated_at' => Time::now()
		]);

		$data['kategori'] = $this->kategori->getKategori($data['produk']['kategori']);
		$data['halaman'] = false;
		$data['category'] = $this->kategori->getKategori();
		$data['user'] = $this->users->getUser();
		$data['title'] = $data['produk']['nama'];
		$data['foto'] = $this->foto->getFoto($id);
		$data['like'] = $this->likes->countLike($id);
		$data['komentar'] = $this->comments->getComment($id);
		$data['rekomendasi'] = $this->produks->recomendation($data['produk']['kategori']);
		$data['validation'] = \Config\Services::validation();
		$data['foto2'] = [];
		$ratings = $this->ratings->getRating($id);
		$i = 0;
		if ($ratings) {
			foreach ($ratings as $r) {
				$i = $i + $r['rating'];
			}
			$data['rating'] = $i / count($ratings);
		} else {
			$data['rating'] = 0;
		}
		foreach ($data['rekomendasi'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto2'], $foto);
		}

		return view('home/detail', $data);
	}

	public function comment($id)
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		if (!$this->validate([
			'nama'		=> 'required',
			'komentar' 	=> 'required',
			'foto'		=> 'mime_in[foto,image/jpg,image/jpeg,image/png]|is_image[foto]'
		])) {
			return redirect()->to('product/' . $id)->withInput();
		}

		$gambar = $this->request->getFile('foto');
		if ($gambar->getError() == 4) {
			$namaGambar = null;
		} else {
			$namaGambar = $gambar->getRandomName();
			$gambar->move('img/komentar', $namaGambar);
		}

		$nama = $this->comments->getCookie($_COOKIE['token']);
		if ($nama) {
			$username = $nama['username'];
		} else {
			$username = $this->request->getVar('nama');
		}

		$this->comments->save([
			'cookie'	=> $_COOKIE['token'],
			'id_produk' => $id,
			'username' 	=> $username,
			'komentar' => $this->request->getVar('komentar'),
			'foto'	=> $namaGambar,
			'created_at'	=> Time::now(),
			'updated_at'	=> Time::now()
		]);

		// dd($_COOKIE['token']);
		session()->setFlashdata('true', 'Anda berhasil berkomentar');
		return redirect()->to('product/' . $id);
	}

	public function produk()
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['title'] = 'List Product';
		$data['keyword'] = $this->request->getGet('keyword');
		$data['sort'] = $this->request->getGet('sort');
		$data['category'] = $this->kategori->getKategori();
		$data['filter'] = $this->request->getGet('filter');
		if ($data['keyword']) {
			if ($data['sort']) {
				if ($data['filter']) {
					$data['produk'] = $this->produks->getProduct($data['keyword'], $data['sort'], $data['filter']);
				} else {
					$data['produk'] = $this->produks->getProduct($data['keyword'], $data['sort']);
				}
			} else {
				$data['produk'] = $this->produks->getProduct($data['keyword']);
			}
		} else {
			if ($data['sort']) {
				if ($data['filter']) {
					$data['produk'] = $this->produks->getProduct(null, $data['sort'], $data['filter']);
				} else {
					$data['produk'] = $this->produks->getProduct(null, $data['sort']);
					// dd($data['produk']);
				}
			} else {
				$data['produk'] = $this->produks->getProduct();
			}
		}
		$data['kategori'] = $this->kategori->getKategori();
		$data['foto'] = [];
		$data['validation'] = \Config\Services::validation();
		$data['halaman'] = true;

		foreach ($data['produk'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto'], $foto);
		}

		return view('home/produk', $data);
	}

	public function promosi()
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['title'] = 'List Promotion';
		$data['keyword'] = $this->request->getGet('keyword');
		$data['sort'] = $this->request->getGet('sort');
		$data['category'] = $this->kategori->getKategori();
		$data['filter'] = $this->request->getGet('filter');
		if ($data['keyword']) {
			if ($data['sort']) {
				if ($data['filter']) {
					$data['produk'] = $this->produks->getProduct($data['keyword'], $data['sort'], $data['filter']);
				} else {
					$data['produk'] = $this->produks->getProduct($data['keyword'], $data['sort']);
				}
			} else {
				$data['produk'] = $this->produks->getProduct($data['keyword']);
			}
		} else {
			if ($data['sort']) {
				if ($data['filter']) {
					$data['produk'] = $this->produks->getProduct(null, $data['sort'], $data['filter']);
				} else {
					$data['produk'] = $this->produks->getProduct(null, $data['sort']);
					// dd($data['produk']);
				}
			} else {
				$data['produk'] = $this->produks->getProduct();
			}
		}
		$data['kategori'] = $this->kategori->getKategori();
		$data['foto'] = [];
		$data['validation'] = \Config\Services::validation();
		$data['halaman'] = true;

		foreach ($data['produk'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto'], $foto);
		}

		return view('home/promosi', $data);
	}

	public function profil()
	{
		$data['title'] = 'Profil Pelapak';
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['category'] = $this->kategori->getKategori();
		$data['halaman'] = false;

		return view('home/profil', $data);
	}

	public function penilaian()
	{
		$data['user'] = $this->users->getUser($this->adminEmail);
		$data['title'] = 'Rating Product';
		$data['keyword'] = $this->request->getGet('keyword');
		$data['sort'] = $this->request->getGet('sort');
		$data['filter'] = $this->request->getGet('filter');
		$data['category'] = $this->kategori->getKategori();
		$data['likes'] = $this->likes->getLike($_COOKIE['token']);
		$data['rating'] = $this->ratings->getRating();
		$data['rating2'] = $this->ratings->getRating(1111111111, null, $_COOKIE['token']);
		if ($data['keyword']) {
			if ($data['sort']) {
				$data['produk'] = $this->produks->getProduct($data['keyword'], $data['sort']);
			} else {
				$data['produk'] = $this->produks->getProduct($data['keyword']);
			}
		} else {
			if ($data['sort']) {
				$data['produk'] = $this->produks->getProduct(null, $data['sort']);
			} else {
				$data['produk'] = $this->produks->getProduct();
			}
		}
		$data['foto'] = [];
		$data['validation'] = \Config\Services::validation();
		$data['halaman'] = true;

		foreach ($data['produk'] as $p) {
			$foto = $this->foto->getThumbnail($p['id']);
			array_push($data['foto'], $foto);
		}

		// dd($data);
		return view('home/penilaian', $data);
	}

	public function rate($id)
	{
		$this->ratings->save([
			'cookie'	=>	$_COOKIE['token'],
			'id_produk'	=>	$id,
			'rating'	=>	$this->request->getVar('rating'),
			'created_at' =>	Time::now(),
			'updated_at' =>	Time::now()
		]);

		session()->setFlashdata('true', 'Rating berhasil ditambahkan');

		return redirect()->to('/rating');
	}

	public function like($id)
	{
		$this->likes->save([
			'cookie'	=>	$_COOKIE['token'],
			'id_produk'	=>	$id,
			'like'		=>	1,
			'created_at' =>	Time::now(),
			'updated_at' =>	Time::now()
		]);

		return redirect()->to('/rating');
	}

	public function unlike($id)
	{
		$like = $this->likes->where('cookie', $_COOKIE['token'])->where('id_produk', $id)->first();
		$this->likes->delete($like['id']);

		return redirect()->to('/rating');
	}
}
