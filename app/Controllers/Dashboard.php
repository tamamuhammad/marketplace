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

class Dashboard extends BaseController
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
		$produk = $this->produks->getProduk();

		$data['title'] = 'Dashboard';

		// dd(date('Y', time()));
		return view('dashboard/index', $data);
	}
}
