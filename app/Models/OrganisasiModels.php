<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganisasiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_organisasi';
    protected $primaryKey           = 'o_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'o_nama',
        'o_create_at',
        'o_update_at',
        'o_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'o_create_at';
    protected $updatedField         = 'o_update_at';
    protected $deletedField         = 'o_delete_at';

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
