<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'u_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'u_npm' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            // 'u_email' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => 255,
            // ],
            'u_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'u_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'u_role' => [
                'type' => 'ENUM',
                'constraint' => ['SuperAdmin', 'Mahasiswa', 'AdminLK/OK'],
                'null' => true,
            ],
            'u_gender' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'null' => true,
            ],
            'u_prodi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'u_angkatan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'u_alamat' => [
                'type' => 'TEXT',
            ],
            'u_create_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'u_update_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'u_delete_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('u_id');
        // $this->forge->addUniqueKey('u_prodi', true);
        // $this->forge->addForeignKey('u_prodi', 'tb_prodi', 'p_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
