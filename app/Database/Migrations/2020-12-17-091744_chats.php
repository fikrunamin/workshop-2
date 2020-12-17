<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chats extends Migration
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
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
			],
			'sender' => [
				'type' => 'VARCHAR',
				'constraint'  => 255,
			],
			'message' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			],
		]);


		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('chats');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('chats');
	}
}
