<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Misi extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'm_id'         => [
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
            'm_ke1'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'm_ke2'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'm_ke3'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'm_ke4'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'm_ke5'          => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'm_create_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'm_update_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'm_delete_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('m_id', true);
        $this->forge->createTable('tb_misi');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_misi');
    }
}
