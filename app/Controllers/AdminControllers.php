<?php

namespace App\Controllers;

use App\Controllers\UsersControllers;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request ,$post, $load
 */




class AdminControllers extends UsersControllers
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getUserRole()
    {
        return 'AdminLK/OK';
    }
    public function dashboard()
    {
        $menu = parent::dashboard();
        return view("admin/dashboard", $menu);
    }
    public function listdataLKOK()
    {
        $menu = parent::LKOK();
        return view("admin/LKOK/DataLKOK/datalkok", $menu);
    }
    public function morelkok($o_id)
    {
        $menu = parent::morelkok($o_id);
        return view("admin/LKOK/DataLKOK/morelkok", $menu);
    }
    public function visiregister($o_id)
    {
        $menu = parent::visiregister($o_id);
        return view("admin/LKOK/DataLKOK/registervisi", $menu);
    }
    public function visiregisterproses()
    {
        return parent::visiregisterproses();
    }
    public function visiedit($o_id)
    {
        $menu = parent::visiedit($o_id);
        // Pengecekan validasi data
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("admin/LKOK/DataLKOK/registereditvisi", $menu);
    }
    public function misiregister($o_id)
    {
        $menu = parent::misiregister($o_id);
        return view("admin/LKOK/DataLKOK/registermisi", $menu);
    }
    public function misiregisterproses()
    {
        return parent::misiregisterproses();
    }
    public function misiedit($o_id)
    {
        $menu = parent::misiedit($o_id);
        // Pengecekan validasi data
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("admin/LKOK/DataLKOK/registereditmisi", $menu);
    }
    public function listdataanggotaLKOK()
    {
        $menu = parent::listdataanggotaLKOK();
        return view("admin/LKOK/DataAnggotaLKOK/dataanggotalkok", $menu);
    }
    public function registeranggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
        ];
        return view("admin/LKOK/DataAnggotaLKOK/registeranggotalkok", $menu);
    }
    public function registeranggotaLKOKprocess()
    {
        return parent::registeranggotaLKOKprocess();
    }
    public function editanggotaLKOK($ao_id)
    {
        $menu = parent::editanggotaLKOK($ao_id);
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("admin/LKOK/DataAnggotaLKOK/registereditanggotalkok", $menu);
    }
    public function deleteanggotaLKOK($ao_id)
    {
        return parent::deleteanggotaLKOK($ao_id);
    }
    public function listdataevent()
    {
        $menu = parent::listdataevent();
        return view("admin/Event/dataevent", $menu);
    }
    public function registerevent()
    {
        $menu = parent::registerevent();
        return view("admin/Event/registerevent", $menu);
    }
    public function registereventprocess()
    {
        return parent::registereventprocess();
    }
    public function editevent($e_id)
    {
        $menu = parent::editevent($e_id);
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("admin/Event/registereditevent", $menu);
    }
    public function deleteevent($k_id)
    {
        return parent::deleteevent($k_id);
    }
    public function viewevent()
    {
        $menu = parent::viewevent();
        return view("admin/Event/viewevent", $menu);
    }
    public function vieweventbyid($k_id)
    {
        $menu = parent::vieweventbyid($k_id);
        return view("admin/Event/vieweventbyid", $menu);
    }
}
