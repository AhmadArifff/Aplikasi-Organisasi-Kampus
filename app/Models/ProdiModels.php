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
    public function datapaket()
    {
        return $this->db->table('tb_paket')->Get()->getResultArray();
    }
    public function datauser()
    {
        $query = $this->db->query('SELECT * FROM `tb_user` WHERE u_role = "coordinator" OR u_role = "owner"OR u_role = "anggota"');
        return $query->getResultArray();
    }
    public function HargaPaket($p_id)
    {
        return $this->db->table('tb_paket')->where('p_id', $p_id)->Get()->getResultArray();
    }
    public function dataperiodeby_id($pe_id)
    {
        return $this->db->table('tb_pay_periode')->where('pe_id', $pe_id)->Get()->getResultArray();
    }
    public function datacicilanby_id($c_id)
    {
        return $this->db->table('tb_cicilan')->where('c_id', $c_id)->Get()->getResultArray();
    }
    public function get_transaksi_paket_by_idi($field, $id)
    {
        return $this->where($field, $id)->findAll();
    }
    public function get_datatransaksi()
    {
        return $this->db->table('tb_transaksi')->Get()->getResultArray();
    }
    public function datatransaksi_by_id($p_id)
    {
        return $this->db->table('tb_transaksi')->where('p_id', $p_id)->Get()->getResultArray();
    }
    public function datalogcicilansementara_by_id($l_id)
    {
        return $this->db->table('tb_log_cicilan_sementara')->where('l_id', $l_id)->Get()->getResultArray();
    }
    public function datalogcicilansementara_by_c_id($l_id)
    {
        return $this->db->table('tb_log_cicilan_sementara')->where('c_id', $l_id)->Get()->getResultArray();
    }
    public function datalogcicilan_by_id($l_id)
    {
        return $this->db->table('tb_log_cicilan')->where('c_id', $l_id)->Get()->getResultArray();
    }
    public function get_datalogcicilan_sementara()
    {
        return $this->db->table('tb_log_cicilan_sementara')->Get()->getResultArray();
    }
    public function get_datalogcicilan()
    {
        return $this->db->table('tb_log_cicilan')->Get()->getResultArray();
    }
    public function get_datacicilan()
    {
        return $this->db->table('tb_cicilan')->Get()->getResultArray();
    }
    public function get_dataperiode()
    {
        return $this->db->table('tb_pay_periode')->Get()->getResultArray();
    }
    public function deletetransaksipengambilanpeket($t_id)
    {
        $query = $this->db->query('DELETE FROM tb_transaksi_pengambilan_paket WHERE pp_t_id = ?', [$t_id]);
        return $query;
    }
    public function deletetransaksicicilan($t_id)
    {
        $query = $this->db->query('DELETE FROM tb_cicilan WHERE t_id = ?', [$t_id]);
        return $query;
    }
}
