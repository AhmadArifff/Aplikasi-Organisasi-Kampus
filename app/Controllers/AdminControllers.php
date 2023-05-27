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




class AdminControllers extends BaseController
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
            'Event' => '',
            'DataanggotaLKOK' => '',
        ];
        return view("admin/dashboard", $menu);
    }
    public function listdataanggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => '',
            'DataanggotaLKOK' => 'DataanggotaLKOK',
            's' => 's',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
        ];
        return view("admin/LKOK/DataAnggotaLKOK/dataanggotalkok", $menu);
    }
    public function registeranggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => '',
            'DataanggotaLKOK' => 'DataanggotaLKOK',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
        ];
        return view("admin/LKOK/DataAnggotaLKOK/registeranggotalkok", $menu);
    }
    public function editanggotaLKOK($ao_id)
    {
        $menu = [
            'Dashboard' => '',
            'Event' => '',
            'DataanggotaLKOK' => 'DataanggotaLKOK',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->where('ao_id', $ao_id)->first(),
        ];
        return view("admin/LKOK/DataAnggotaLKOK/registereditanggotalkok", $menu);
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
        return view("admin/Event/dataevent", $menu);
    }
    public function registerevent()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'DataanggotaLKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
        ];
        return view("admin/Event/registerevent", $menu);
    }
    public function editevent($e_id)
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'DataanggotaLKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_kegiatan' => $this->KegiatanModels->where('k_id', $e_id)->first(),
        ];
        return view("admin/Event/registereditevent", $menu);
    }
}
