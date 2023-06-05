<?php

namespace App\Models;

use CodeIgniter\Model;

class MisiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_misi';
    protected $primaryKey           = 'm_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'o_id',
        'm_ke1',
        'm_ke2',
        'm_ke3',
        'm_ke4',
        'm_ke5',
        'm_create_at',
        'm_update_at',
        'm_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'm_create_at';
    protected $updatedField         = 'm_update_at';
    protected $deletedField         = 'm_delete_at';

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
