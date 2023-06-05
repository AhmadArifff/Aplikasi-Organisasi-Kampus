<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Korespondensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kp_id'             => [
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
            'kp_nama'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'kp_nama_file'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'kp_chek_by_u_id'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kp_create_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'kp_update_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'kp_delete_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addPrimaryKey('kp_id', true);
        // $this->forge->addUniqueKey('u_id', true);
        // $this->forge->addUniqueKey('kp_chek_by_u_id', true);
        // $this->forge->addForeignKey('u_id', 'tb_user', 'u_id', 'RESTRICT', 'RESTRICT');
        // $this->forge->addForeignKey('kp_chek_by_u_id', 'tb_user', 'u_id', 'RESTRICT', 'RESTRICT');

        $this->forge->createTable('tb_korespondensi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_korespondensi');
    }
}
