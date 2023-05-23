<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AnggotaOrganisasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ao_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'u_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'p_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'o_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'ao_create_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'ao_update_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'ao_delete_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('ao_id', true);
        $this->forge->addUniqueKey('u_id', true);
        $this->forge->addUniqueKey('p_id', true);
        $this->forge->addUniqueKey('o_id', true);
        // $this->forge->addForeignKey('u_id', 'tb_user', 'u_id', 'RESTRICT', 'RESTRICT');
        // $this->forge->addForeignKey('p_id', 'tb_prodi', 'p_id', 'RESTRICT', 'RESTRICT');
        // $this->forge->addForeignKey('o_id', 'tb_organisasi', 'o_id', 'RESTRICT', 'RESTRICT');

        $this->forge->createTable('tb_anggota_organisasi');
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->forge->dropTable('tb_anggota_organisasi');
    }
}
