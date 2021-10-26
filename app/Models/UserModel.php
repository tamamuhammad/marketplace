<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'user';
	protected $allowedFields        = ['username', 'email', 'password', 'name', 'wa'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getUser($email = null)
	{
		if ($email) {
			return $this->where('email', $email)->first();
		}
		return $this->first();
	}
}
