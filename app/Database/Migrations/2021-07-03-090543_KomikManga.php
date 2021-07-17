<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KomikManga extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'penulis'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'sampul'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at'   => [
				'type'		=> 'DATETIME',
				'null'		=> true
			],
			'updated_at'   => [
				'type'		=> 'DATETIME',
				'null'		=> true
			],
			'sinopsis'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tahun_rilis'       => [
				'type'       => 'INT',
				'constraint' => 4,
			],
			'penerbit'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
			],
			'rating'       => [
				'type'       => 'FLOAT',
				'constraint' => 4,
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('komikmanga');
	}

	public function down()
	{
		$this->forge->dropTable('komikmanga');
	}
}
