<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
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
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'deskripsi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '1080',
			],
			'stok'       => [
				'type'       => 'INT',
				'constraint' => '255',
			],
			'harga'       => [
				'type'       => 'INT',
				'constraint' => '255',
			],
			'promosi'       => [
				'type'       => 'INT',
				'constraint' => '255',
				'null'		 => true
			],
			'penawaran'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'		 => true
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
		$this->forge->createTable('produk');
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
