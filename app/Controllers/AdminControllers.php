<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\ProdiModels;
use App\Models\OrganisasiModels;
use App\Models\AnggotaOrganisasiModels;
use App\Models\KegiatanModels;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request ,$post, $load
 */




class SuperAdminControllers extends BaseController
{
    protected $UsersModels;
    protected $ProdiModels;
    protected $FakultasModels;
    protected $OrganisasiModels;
    protected $AnggotaOrganisasiModels;
    protected $KegiatanModels;
    public function __construct()
    {
        if (session()->get('u_role') != "AdminLK/OK") {
            echo 'Access denied';
            exit;
        }
        // $this->load->library('select2');
        $this->UsersModels = new UsersModels();
        $this->ProdiModels = new ProdiModels();
        $this->OrganisasiModels = new OrganisasiModels();
        $this->AnggotaOrganisasiModels = new AnggotaOrganisasiModels();
        $this->KegiatanModels = new KegiatanModels();
    }
    public function dashboard()
    {
        $menu = [
            'Dashboard' => 'dashboard',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
        ];
        return view("admin/dashboard", $menu);
    }
    public function listdatauser()
    {
        $menu = [
            'Dashboard' => '',
            'User' => 'user',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
        ];
        return view("admin/Datauser/datauser", $menu);
    }
    public function registeruser()
    {
        $menu = [
            'Dashboard' => '',
            'User' => 'user',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
        ];
        return view("admin/Datauser/registeruser", $menu);
    }
}
