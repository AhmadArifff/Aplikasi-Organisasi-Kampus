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
        'u_id',
        'p_id',
        'k_nama',
        'k_deskripsikegiatan',
        'k_jeniskegiatan',
        'k_foto',
        'k_check_u_id',
        'k_create_at',
        'k_update_at',
        'k_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'k_create_at';
    protected $updatedField         = 'k_update_at';
    protected $deletedField         = 'k_delete_at';

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
    
    public function dataeventbyid($k_id)
    {
        return $this->db->table('tb_kegiatan')->where('k_id', $k_id)->Get()->getRowArray();
    }
}
