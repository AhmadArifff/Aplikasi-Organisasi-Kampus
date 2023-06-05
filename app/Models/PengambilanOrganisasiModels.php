<?php

namespace App\Models;

use CodeIgniter\Model;

class PengambilanOrganisasiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_pengambilan_organisasi';
    protected $primaryKey           = 'po_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'ao_id', 'o_id', 'po_create_at', 'po_update_at', 'po_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'po_create_at';
    protected $updatedField         = 'po_update_at';
    protected $deletedField         = 'po_delete_at';

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
    public function delete_pengambilan_organisasi_by_ao_id($id)
    {
        $query = "DELETE FROM tb_pengambilan_organisasi WHERE ao_id = ?";
        $this->db->query($query, [$id]);
    }
}
