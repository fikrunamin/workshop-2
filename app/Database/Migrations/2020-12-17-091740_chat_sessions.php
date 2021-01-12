<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChatSessions extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'session' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'id_user' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'started_at' => [
				'type'           => 'DATETIME',
			],
		]);

		$this->forge->addKey('session', true);

		$this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('chat_sessions');
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('chat_sessions');
	}
}
