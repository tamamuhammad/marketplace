<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rating extends Migration
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
			'rating'       => [
				'type'       => 'INT',
				'constraint' => '5',
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
		$this->forge->createTable('rating');
	}

	public function down()
	{
		$this->forge->dropTable('rating');
	}
}
