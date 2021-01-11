<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Intents extends Migration
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
			'id_symptom' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
				'null' => true
			],
			'id_tag' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
				'null' => true
			],
		]);


		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_symptom', 'symptoms', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_tag', 'tags', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('intents');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('intents');
	}
}
