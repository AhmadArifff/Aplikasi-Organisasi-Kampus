<?php

namespace App\Models;

use CodeIgniter\Model;

class KorespondensiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_korespondensi';
    protected $primaryKey           = 'kp_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "u_id",
        "kp_nama",
        "kp_nama_file",
        "kp_chek_by_u_id",
        "kp_create_at",
        "kp_update_at",
        "kp_delete_at"
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'kp_create_at';
    protected $updatedField         = 'kp_update_at';
    protected $deletedField         = 'kp_delete_at';

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
}
