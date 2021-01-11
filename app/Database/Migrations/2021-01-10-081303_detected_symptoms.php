<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetectedSymptoms extends Migration
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
			'id_chat_history' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'id_symptom' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'created_at' => [
				'type'           => 'DATETIME',
			],
			'updated_at' => [
				'type'           => 'DATETIME',
			],
		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('id_symptom', 'symptoms', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_chat_history', 'chat_histories', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('detected_symptoms');
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('detected_symptoms');
	}
}
