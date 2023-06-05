<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visi extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'v_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'o_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'v_ke1'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'v_ke2'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'v_ke3'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'v_ke4'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'v_ke5'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'v_create_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'v_update_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'v_delete_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('v_id', true);
        $this->forge->createTable('tb_visi');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_visi');
    }
}
