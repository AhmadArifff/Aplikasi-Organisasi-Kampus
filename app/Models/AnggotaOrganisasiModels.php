<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaOrganisasiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_anggota_organisasi';
    protected $primaryKey           = 'ao_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'u_id', 'p_id', 'ao_foto', 'ao_staf', 'ao_create_at', 'ao_update_at', 'ao_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'ao_create_at';
    protected $updatedField         = 'ao_update_at';
    protected $deletedField         = 'ao_delete_at';

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
    public function deleteanggota_by_ao_id($id)
    {
        $query = "DELETE FROM tb_pengambilan_organisasi WHERE ao_id = ?";
        $this->db->query($query, [$id]);
    }
    public function dataanggotaorganisasibyid($ao_id)
    {
        return $this->db->table('tb_anggota_organisasi')->where('ao_id', $ao_id)->Get()->getRowArray();
    }
}
