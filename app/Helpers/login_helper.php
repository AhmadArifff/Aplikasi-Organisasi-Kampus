<?php

namespace App\Helpers;

class login_helper
{
    private $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function userlogin()
    {
        return $this->db->table('tb_user')->where('u_id', session('u_id'))->get()->getRow();
    }
    //Overloading
    public function countdata($table, $condition = [])
    {
        $query = $this->db->table($table);
        if (!empty($condition)) {
            foreach ($condition as $key => $value) {
                if (is_array($value) && $key === 'OR') {
                    $query->orWhere($value);
                } else {
                    $query->where($key, $value);
                }
            }
        }
        return $query->countAllResults();
    }
}
