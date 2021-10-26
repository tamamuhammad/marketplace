<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
	protected $table                = 'like';
	protected $allowedFields        = ['id_produk', 'cookie', 'like'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function countLike($id = null)
	{
		if ($id) {
			return count($this->where('id_produk', $id)->findAll());
		}
		return count($this->findAll());
	}

	function getLike($cookie = null)
	{
		if ($cookie) {
			return $this->where('cookie', $cookie)->findAll();
		}
		return $this->findAll();
	}
}
