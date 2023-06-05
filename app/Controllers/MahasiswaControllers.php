<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\ProdiModels;
use App\Models\KegiatanModels;
use App\Models\OrganisasiModels;
use App\Models\AnggotaOrganisasiModels;
use App\Models\PengambilanOrganisasiModels;


class MahasiswaControllers extends BaseController
{
    protected $UsersModels;
    protected $ProdiModels;
    protected $KegiatanModels;
    protected $OrganisasiModels;
    protected $AnggotaOrganisasiModels;
    protected $PengambilanOrganisasiModels;
    public function __construct()
    {
        if (session()->get('u_role') != "Mahasiswa") {
            echo 'Access denied';
            exit;
        }
        $this->UsersModels = new UsersModels();
        $this->ProdiModels = new ProdiModels();
        $this->OrganisasiModels = new OrganisasiModels();
        $this->KegiatanModels = new KegiatanModels();
        $this->AnggotaOrganisasiModels = new AnggotaOrganisasiModels();
        $this->PengambilanOrganisasiModels = new PengambilanOrganisasiModels();
    }
    public function dashboard()
    {
        $menu = [
            'Dashboard' => 'dashboard',
            'Event' => '',
            'LKOK' => '',
        ];
        return view("mahasiswa/dashboard", $menu);
    }
    public function listdataLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
        ];
        return view("mahasiswa/LKOK/DataLKOK/datalkok", $menu);
    }
    public function morelkok($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'lkok',
            'LKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
            'tb_pengambilanorganisasi' => $this->PengambilanOrganisasiModels->findAll(),
            'tb_user' => $this->UsersModels->findAll(),
        ];
        return view("mahasiswa/LKOK/DataLKOK/morelkok", $menu);
    }
    public function listdataevent()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'LKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
        ];
        return view("mahasiswa/Event/viewevent", $menu);
    }
}
