<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ListChapterManga extends Migration
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
				'constraint' => '50',
			],
			'chapter'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
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
		$this->forge->createTable('listchaptermanga');
	}

	public function down()
	{
		$this->forge->dropTable('listchaptermanga');
	}
}
