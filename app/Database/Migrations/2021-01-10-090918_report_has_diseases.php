<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReportHasDiseases extends Migration
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
			'id_report' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'id_detected_disease' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('id_report', 'reports', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_detected_disease', 'detected_diseases', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('report_has_diseases');
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('report_has_diseases');
	}
}
