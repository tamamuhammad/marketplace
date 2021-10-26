<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Foto extends Migration
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
			'id_produk'       => [
				'type'       => 'INT',
				'constraint' => '11',
			],
			'foto'       => [
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
		$this->forge->createTable('foto');
	}

	public function down()
	{
		$this->forge->dropTable('foto');
	}
}
