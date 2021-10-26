<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
	protected $table                = 'comment';
	protected $allowedFields        = ['id_produk', 'username', 'komentar', 'foto', 'cookie'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	function getComment($id = null)
	{
		if ($id) {
			return $this->where('id_produk', $id)->paginate(10, 'comment');
		}
		return $this->paginate(10, 'comment');
	}

	function getCookie($cookie)
	{
		return $this->where('cookie', $cookie)->first();
	}
}
