<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Patterns extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint'  => 255,
			]
		]);


		$this->forge->addKey('id', true);

		$this->forge->createTable('patterns');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('patterns');
	}
}
