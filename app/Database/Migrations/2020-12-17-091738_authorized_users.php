<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthorizedUsers extends Migration
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
			'id_user' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'role' => [
				'type'           => 'INT',
				'constraint'     => 1,
				'null'       	 => false,
			],
			'created_at' => [
				'type'           => 'DATETIME',
			],
			'updated_at' => [
				'type'           => 'DATETIME',
			]
		]);

		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('authorized_users');
		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('authorized_users');
	}
}
