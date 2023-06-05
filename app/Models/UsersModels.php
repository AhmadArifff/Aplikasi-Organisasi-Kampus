<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_user';
    protected $primaryKey           = 'u_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'u_npm',
        // 'u_email',
        'u_password',
        'u_nama',
        'u_role',
        'u_gender',
        'u_prodi',
        'u_angkatan',
        'u_alamat',
        'u_create_at',
        'u_update_at',
        'u_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'u_create_at';
    protected $updatedField         = 'u_update_at';
    protected $deletedField         = 'u_delete_at';

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
    public function getuserno_superadmin()
    {
        $query = $this->db->query('SELECT * FROM `tb_user` WHERE u_role = "Mahasiswa" OR u_role = "AdminLK/OK"');
        return $query->getResultArray();
    }
    public function getuser_u_id($u_id)
    {
        return $this->db->table('tb_user')->where('u_id', $u_id)->Get()->getResultArray();
    }
}
