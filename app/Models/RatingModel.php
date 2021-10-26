<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
	protected $table                = 'rating';
	protected $allowedFields        = ['id_produk', 'cookie', 'rating'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function getRating($id = null, $rating = null, $cookie = null)
	{
		if ($id && $rating) {
			return $this->where('id_produk', $id)->where('rating', $rating)->findAll();
		} else if ($id && !$rating && !$cookie) {
			return $this->where('id_produk', $id)->findAll();
		} else if ($id && $cookie) {
			return $this->where('cookie', $cookie)->where('id_produk', $id)->findAll();
		}
		return $this->findAll();
	}
}
