<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Organisasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'o_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'o_nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'o_create_at'  => [
                'type'       => 'DATETIME',
            ],
            'o_update_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'o_delete_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('o_id', true);
        $this->forge->createTable('tb_organisasi');
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->forge->dropTable('tb_organisasi');
    }
}
