<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_kegiatan';
    protected $primaryKey           = 'k_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'p_id',
        'k_nama',
        'k_kegiatan',
        'k_jeniskegiatan',
        'k_create_at',
        'k_update_at',
        'k_delete_at'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'u_created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
    public function datakategoribarang()
    {
        return $this->db->table('tb_kategori')->Get()->getResultArray();
    }
}
