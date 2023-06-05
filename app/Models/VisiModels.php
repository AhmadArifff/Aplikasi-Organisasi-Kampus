<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_visi';
    protected $primaryKey           = 'v_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'o_id',
        'v_ke1',
        'v_ke2',
        'v_ke3',
        'v_ke4',
        'v_ke5',
        'v_create_at',
        'v_update_at',
        'v_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'v_create_at';
    protected $updatedField         = 'v_update_at';
    protected $deletedField         = 'v_delete_at';

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
