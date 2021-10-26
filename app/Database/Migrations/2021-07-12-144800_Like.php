<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Like extends Migration
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
			'cookie'       => [
				'type'       => 'VARCHAR',
				'constraint' => '16',
			],
			'id_produk'       => [
				'type'       => 'INT',
				'constraint' => '11',
			],
			'like'       => [
				'type'       => 'INT',
				'constraint' => '2',
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
		$this->forge->createTable('like');
	}

	public function down()
	{
		$this->forge->dropTable('like');
	}
}
