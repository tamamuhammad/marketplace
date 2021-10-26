<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use CodeIgniter\I18n\Time;

class Kategori extends BaseController
{
	protected $kategori;
	protected $produks;

	public function __construct()
	{
		$this->produks = new ProdukModel();
		$this->kategori = new KategoriModel();
	}

	public function index()
	{
		if (!session()->has('email')) {
			return redirect()->to('/login');
		}
		$data['title'] = 'List Kategori';
		$data['kategori'] = $this->kategori->getKategori();
		$data['validation'] = \Config\Services::validation();

		return view('dashboard/kategori', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'kategori' 		=> 'required',
		])) {
			return redirect()->to('/kategori')->withInput();
		}

		$this->kategori->save([
			'kategori' 	=> $this->request->getVar('kategori'),
			'created_at'	=> Time::now(),
			'updated_at'	=> Time::now()
		]);

		session()->setFlashdata('true', 'Kategori berhasil ditambahkan');
		return redirect()->to('/kategori');
	}

	public function update($id)
	{
		if (!$this->validate([
			'kategori' 		=> 'required',
		])) {
			return redirect()->to('/kategori')->withInput();
		}

		$this->kategori->save([
			'id'			=> $id,
			'kategori'		 	=> $this->request->getVar('kategori'),
			'updated_at'	=> Time::now()
		]);

		session()->setFlashdata('true', 'Kategori berhasil diubah');
		return redirect()->to('/kategori');
	}

	public function delete($id)
	{
		$this->kategori->delete($id);

		session()->setFlashdata('true', 'Kategori berhasil dihapus');
		return redirect()->to('/kategori');
	}
}
