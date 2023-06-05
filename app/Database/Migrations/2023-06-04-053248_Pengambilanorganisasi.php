<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengambilanorganisasi extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'po_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ao_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'o_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'po_create_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'po_update_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'po_delete_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('po_id', true);
        // $this->forge->addForeignKey('o_id', 'tb_organisasi', 'o_id', 'RESTRICT', 'RESTRICT');

        $this->forge->createTable('tb_pengambilan_organisasi');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_pengambilan_organisasi');
    }
}
