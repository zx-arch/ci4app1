<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GenreManga extends Migration
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
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '150',
			],
			'genre' => [
				'type'       => 'VARCHAR',
				'constraint' => '25',
			],
			'created_at'   => [
				'type'		=> 'DATETIME',
				'null'		=> true
			],
			'updated_at'   => [
				'type'		=> 'DATETIME',
				'null'		=> true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('genremanga');
	}
	public function down()
	{
		$this->forge->dropTable('genremanga');
	}
}
