<?php

namespace App\Controllers;

use App\Controllers\UsersControllers;


class MahasiswaControllers extends UsersControllers
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getUserRole()
    {
        return 'Mahasiswa';
    }
    public function dashboard()
    {
        $menu = parent::dashboard();
        return view("mahasiswa/dashboard", $menu);
    }
    public function listdataLKOK()
    {
        $menu = parent::LKOK();
        return view("mahasiswa/LKOK/DataLKOK/datalkok", $menu);
    }
    public function morelkok($o_id)
    {
        $menu = parent::morelkok($o_id);
        return view("mahasiswa/LKOK/DataLKOK/morelkok", $menu);
    }
    public function listdataevent()
    {
        $menu = parent::listdataevent();
        return view("mahasiswa/Event/viewevent", $menu);
    }
}
