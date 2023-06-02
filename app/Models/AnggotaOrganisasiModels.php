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
        'u_id', 'p_id', 'o_id', 'ao_create_at', 'ao_update_at', 'ao_delete_at'
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


    public function createAnggotaLKOK(){
        $this->insert($data);
        return $this->getInsertID();
    }

    public function updateAnggotaLKOK($id, $data)
    {
        $this->db->table('tb_anggota_organisasi')->where('id', $id)->update($data);
        $affectedRows = $this->db->affectedRows();
    }

    public function deleteAnggotaLKOK($id = null, bool $purge = false)
    {
        if ($purge)
    {
        // Perform a permanent delete
        $this->db->table('tb_anggota_organisasi')->where('id', $id)->delete();
    }
    else
    {
        // Perform a soft delete
        $this->db->table('tb_anggota_organisasi')->where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }
        return $this->affectedRows();
}
}