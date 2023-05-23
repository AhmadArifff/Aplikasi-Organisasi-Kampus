<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'u_npm' => '40621190002',
                'u_nama' => 'AHMAD ARIF',
                // 'u_email' => 'ahmad.8117@widyatama.ac.id',
                'u_password' => password_hash('12345', PASSWORD_BCRYPT), // encrypt password
                'u_role' => 'mahasiswa',
                'u_gender' => 'Laki-laki',
                'u_prodi' => 1,
                'u_angkatan' => 2021,
                'u_alamat' => 'Jl. Contoh Alamat 123',
                'u_create_at' => date('Y-m-d H:i:s'),
                'u_update_at' => date('Y-m-d H:i:s'),
                'u_delete_at' => null,
            ],
            [
                'u_npm' => '40621190002',
                'u_nama' => 'Admin',
                // 'u_email' => 'admin@widyatama.ac.id',
                'u_password' => password_hash('12345', PASSWORD_BCRYPT), // encrypt password
                'u_role' => 'admin',
                'u_gender' => 'Perempuan',
                'u_prodi' => 2,
                'u_angkatan' => 2021,
                'u_alamat' => 'Jl. Contoh Alamat 123',
                'u_create_at' => date('Y-m-d H:i:s'),
                'u_update_at' => date('Y-m-d H:i:s'),
                'u_delete_at' => null,
            ],
            // Tambahkan data lainnya di sini
        ];

        // Memasukkan data ke tabel tb_user
        $this->db->table('tb_user')->insertBatch($data);
    }
}
