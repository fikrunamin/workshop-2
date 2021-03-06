<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DiseaseHasTreatments extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_disease' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 5,
			],
			'id_treatment' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint'     => 5,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_disease', 'diseases', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_treatment', 'treatments', 'id', 'CASCADE', 'CASCADE');

		$this->forge->createTable('disease_has_treatments');
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('disease_has_treatments');
	}
}
