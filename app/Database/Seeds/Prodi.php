<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Prodi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'p_nama' => 'Teknik Informatika',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Teknik Mesin',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Akutansi',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Manajemen',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Perdagangan Internasional',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Teknik Industri',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Teknik Sipil',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Teknik Elektro',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Sistem Informasi',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Perpustakaan & Sains Informasi',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Desain Grafis',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Produksi Film & Televisi',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Bahasa Inggris',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            [
                'p_nama' => 'Bahasa Jepang',
                'p_create_at' => date('Y-m-d H:i:s'),
                'p_update_at' => date('Y-m-d H:i:s'),
                'p_delete_at' => null,
            ],
            // Tambahkan data prodi lainnya di sini
        ];

        $this->db->table('tb_prodi')->insertBatch($data);
    }
}
