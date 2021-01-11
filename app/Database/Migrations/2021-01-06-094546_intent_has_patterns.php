<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IntentsHasPatterns extends Migration
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
			'id_intent' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
				'null' => true
			],
			'id_pattern' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 5,
				'null' => true
			],
		]);


		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_intent', 'intents', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_pattern', 'patterns', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('intent_has_patterns');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('intent_has_patterns');
	}
}
