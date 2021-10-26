<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
	protected $table                = 'foto';
	protected $allowedFields        = ['id_produk', 'foto'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function getFoto($id = null)
	{
		if ($id) {
			return $this->where('id_produk', $id)->findAll();
		}
		return $this->findAll();
	}

	function getThumbnail($id)
	{
		return $this->where('id_produk', $id)->first();
	}

	// function bestProduk()
	// {
	// 	return $this->orderBy('popularitas', 'DESC')->join('produk', 'produk.id = foto.id_produk')->select('produk.id, produk.nama, produk.harga, produk.promosi, foto.foto');
	// }
}
