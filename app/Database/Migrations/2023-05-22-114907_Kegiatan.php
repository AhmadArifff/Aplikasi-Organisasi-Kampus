<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'k_id'              => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'u_id'              => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'p_id'              => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'k_nama'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'k_deskripsikegiatan'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'k_jeniskegiatan'   => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'k_create_at'       => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'k_update_at'       => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'k_delete_at'       => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('k_id', true);
        $this->forge->addUniqueKey('u_id', true);
        $this->forge->addUniqueKey('p_id', true);
        // $this->forge->addForeignKey('p_id', 'tb_prodi', 'p_id', 'RESTRICT','RESTRICT');

        $this->forge->createTable('tb_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kegiatan');
    }
}
