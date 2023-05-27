<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\ProdiModels;
use App\Models\KegiatanModels;


class MahasiswaControllers extends BaseController
{
    protected $UsersModels;
    protected $ProdiModels;
    protected $KegiatanModels;
    public function __construct()
    {
        if (session()->get('u_role') != "Mahasiswa") {
            echo 'Access denied';
            exit;
        }
        $this->UsersModels = new UsersModels();
        $this->ProdiModels = new ProdiModels();
        $this->KegiatanModels = new KegiatanModels();
    }
    public function dashboard()
    {
        $menu = [
            'Dashboard' => 'dashboard',
            'Event' => '',
            'DataanggotaLKOK' => '',
        ];
        return view("mahasiswa/dashboard", $menu);
    }
    public function listdataevent()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'DataanggotaLKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
        ];
        return view("mahasiswa/Event/dataevent", $menu);
    }
}
