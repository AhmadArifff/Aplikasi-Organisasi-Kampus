<?php

namespace App\Controllers;

use App\Models\UsersModels;

class Home extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $UsersModels = new UsersModels();
        $data['nameuser'] = $UsersModels->getuserreferensi();
        return view('admin/dashboard', $data);
    }
}
