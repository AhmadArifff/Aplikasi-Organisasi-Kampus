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
            // Tambahkan data prodi lainnya di sini
        ];

        $this->db->table('tb_prodi')->insertBatch($data);
    }
}
