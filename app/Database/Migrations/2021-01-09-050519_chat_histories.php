<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChatHistories extends Migration
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
			'id_chat' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
				'null' => true
			],
		]);


		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('session', 'chat_sessions', 'session', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_chat', 'chats', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('chat_histories');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('chat_histories');
	}
}
