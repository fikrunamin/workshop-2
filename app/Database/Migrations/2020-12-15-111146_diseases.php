<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diseases extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id' => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'name' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'definition' => [
                                'type'           => 'TEXT',
                                'null'           => true,
                        ],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('diseases');
        }

        public function down()
        {
                $this->forge->dropTable('diseases');
        }
}
