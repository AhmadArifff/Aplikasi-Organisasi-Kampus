<?php

namespace App\Helpers;

use Exception;

interface LoginHelperInterface
{
    public function userlogin();
    public function countdata($table, $condition = []);
}

class LoginHelper implements LoginHelperInterface
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function userlogin()
    {
        try {
            return $this->db->table('tb_user')->where('u_id', session('u_id'))->get()->getRow();
        } catch (\Exception $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
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
        try {
            return $query->countAllResults();
        } catch (\Exception $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
