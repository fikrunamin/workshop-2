<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reports extends Migration
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
			'id_user' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'session' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'created_at' => [
				'type'           => 'DATETIME',
			],
			'updated_at' => [
				'type'           => 'DATETIME',
			],
		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('session', 'chat_sessions', 'session', 'CASCADE', 'CASCADE');
		$this->forge->createTable('reports');
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('reports');
	}
}
