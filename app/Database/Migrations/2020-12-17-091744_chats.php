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
			'session' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'sender' => [
				'type' => 'VARCHAR',
				'constraint'  => 255,
			],
			'message' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'isSuggestion' => [
				'type' => 'BOOLEAN',
				'default' => '0',
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			],
		]);


		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('session', 'chat_sessions', 'session', 'CASCADE', 'CASCADE');

		$this->forge->createTable('chats');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('chats');
	}
}
