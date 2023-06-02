<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModels extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tb_prodi';
    protected $primaryKey           = 'p_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'p_nama', 'p_create_at', 'p_update_at', 'p_delete_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'p_create_at';
    protected $updatedField         = 'p_update_at';
    protected $deletedField         = 'p_delete_at';

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
    public function getProdi()
    {
        return $this->db->table($this->table)->Get()->getResultArray();
    }
    public function createProdi()
    {
        $this->insert($data);
        return $this->getInsertID();
    }
    public function updateProdi($id, $data)
{
    $this->db->table('tb_prodi')->where('id', $id)->update($data);
    $affectedRows = $this->db->affectedRows();
}
    public function delete($id = null, bool $purge = false)
    {
        if ($purge)
    {
        // Perform a permanent delete
        $this->db->table('tb_prodi')->where('id', $id)->delete();
    }
    else
    {
        // Perform a soft delete
        $this->db->table('tb_prodi')->where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }
        return $this->affectedRows();
}
    }
