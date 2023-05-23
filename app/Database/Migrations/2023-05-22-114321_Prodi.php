<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'p_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'p_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'p_create_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'p_update_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'p_delete_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('p_id');
        $this->forge->createTable('tb_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_prodi');
    }
}
