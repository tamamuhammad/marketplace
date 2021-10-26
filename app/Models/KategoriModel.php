<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table                = 'kategori';
	protected $allowedFields        = ['kategori'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function getKategori($id = null)
	{
		if ($id) {
			return $this->where('id', $id)->first();
		}
		return $this->findAll();
	}
}
