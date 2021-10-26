<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'wa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at'       => [
				'type'       => 'DATETIME',
				'null' => TRUE,
			],
			'updated_at'       => [
				'type'       => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
