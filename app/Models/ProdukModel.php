<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
	protected $table                = 'produk';
	protected $allowedFields        = ['nama', 'kategori', 'deskripsi', 'stok', 'harga', 'promosi', 'penawaran', 'popularitas'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function getProduk($id = null, $keyword = null)
	{
		if ($id) {
			return $this->where('id', $id)->first();
		} else if ($keyword) {
			return $this->like('nama', $keyword)->orLike('deskripsi', $keyword)->paginate(10, 'produk');
		}
		return $this->paginate(10, 'produk');
	}

	function getProduct($keyword = null, $sort = null, $filter = null)
	{
		if ($keyword) {
			if ($sort && !$filter) {
				if ($sort == 'terbaru') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->orderBy('produk.updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->orderBy('popularitas', 'DESC')->findAll();
				} else if ($sort == 'termurah') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->orderBy('harga', 'ASC')->findAll();
				} else if ($sort == 'termahal') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->orderBy('harga', 'DESC')->findAll();
				} else if ($sort == 'terbesar') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->orderBy('promosi', 'DESC')->findAll();
				}
			} else if (!$sort && $filter) {
				return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->paginate(10, 'produk');
			} else if ($sort && $filter) {
				if ($sort == 'terbaru') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->orderBy('produk.updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->orderBy('popularitas', 'DESC')->findAll();
				} else if ($sort == 'termurah') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->orderBy('harga', 'ASC')->findAll();
				} else if ($sort == 'termahal') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->orderBy('harga', 'DESC')->findAll();
				} else if ($sort == 'terbesar') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->where('produk.kategori', $filter)->orderBy('promosi', 'DESC')->findAll();
				}
			}
			return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->like('nama', $keyword)->orLike('deskripsi', $keyword)->orLike('kategori.kategori', $keyword)->findAll();
		} else {
			if ($sort && !$filter) {
				if ($sort == 'terbaru') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->orderBy('produk.updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->orderBy('popularitas', 'DESC')->findAll();
				} else if ($sort == 'termurah') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->orderBy('harga', 'ASC')->findAll();
				} else if ($sort == 'termahal') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->orderBy('harga', 'DESC')->findAll();
				} else if ($sort == 'terbesar') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->orderBy('promosi', 'DESC')->findAll();
				}
			} else if (!$sort && $filter) {
				return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->findAll();
			} else if ($sort && $filter) {
				if ($sort == 'terbaru') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->orderBy('produk.updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->orderBy('popularitas', 'DESC')->findAll();
				} else if ($sort == 'termurah') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->orderBy('harga', 'ASC')->findAll();
				} else if ($sort == 'termahal') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->orderBy('harga', 'DESC')->findAll();
				} else if ($sort == 'terbesar') {
					return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $filter)->orderBy('promosi', 'DESC')->findAll();
				}
			}
			return $this->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->findAll();
		}
	}

	function bestProduk()
	{
		return $this->orderBy('popularitas', 'DESC')->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->paginate(5, 'produk');
	}

	function promotion()
	{
		return $this->orderBy('popularitas', 'DESC')->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('promosi !=', null)->orWhere('penawaran !=', null)->paginate(5, 'produk');
	}

	function recomendation($kategori)
	{
		return $this->orderBy('popularitas', 'DESC')->join('kategori', 'kategori.id = produk.kategori')->select('produk.id, produk.nama, produk.harga, produk.promosi, produk.penawaran, kategori.kategori')->where('produk.kategori', $kategori)->findAll();
	}

	function productRating($keyword = null, $sort = null)
	{
		if ($keyword) {
			if ($sort) {
				if ($sort == 'terbaru') {
					return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->like('produk.nama', $keyword)->orderBy('updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->like('nama', $keyword)->orderBy('popularitas', 'DESC')->findAll();
				}
			} else {
				return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->like('nama', $keyword)->findAll();
			}
		} else {
			if ($sort) {
				if ($sort == 'terbaru') {
					return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->orderBy('produk.updated_at', 'DESC')->findAll();
				} else if ($sort == 'terpopuler') {
					return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->orderBy('popularitas', 'DESC')->findAll();
				}
			} else {
				return $this->join('rating', 'rating.id_produk = produk.id')->select('produk.id, produk.nama, rating.rating')->findAll();
			}
		}
	}
}
