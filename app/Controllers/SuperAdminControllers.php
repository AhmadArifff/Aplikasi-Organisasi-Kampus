<?php

namespace App\Controllers;

use App\Controllers\UsersControllers;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request ,$post, $load
 */




class SuperAdminControllers extends UsersControllers
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function getUserRole()
    {
        return 'SuperAdmin';
    }
    public function dashboard()
    {
        $menu = parent::dashboard();
        return view("superadmin/dashboard", $menu);
    }
    public function listdatauser()
    {
        $menu = parent::Users();
        return view("superadmin/Datauser/datauser", $menu);
    }
    public function registeruser()
    {
        $menu = parent::Users();
        return view("superadmin/Datauser/registeruser", $menu);
    }
    public function registeruserprocess()
    {
        return parent::registeruserprocess();
    }

    public function edituser($u_id)
    {
        $menu = parent::edituser($u_id);

        // Pengecekan validasi data
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }

        return view("superadmin/Datauser/registeredituser", $menu);
    }


    public function deleteuser($u_id)
    {
        return parent::deleteuser($u_id);
    }
    public function listdatafakultas()
    {
        return parent::listdatafakultas();
    }
    public function registerfakultas()
    {
        return parent::registerfakultas();
    }
    public function registerfakultasprocess()
    {
        return parent::registerfakultasprocess();
    }
    public function editfakultas($p_id)
    {
        $menu = parent::editfakultas($p_id);
        // Pengecekan validasi data
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("superadmin/DataFakultas/registereditfakultas", $menu);
    }
    public function deletefakultas($p_id)
    {
        return parent::deletefakultas($p_id);
    }
    public function listdataLKOK()
    {
        $menu = parent::LKOK();
        return view("superadmin/LKOK/DataLKOK/datalkok", $menu);
    }
    public function morelkok($o_id)
    {
        $menu = parent::morelkok($o_id);
        return view("superadmin/LKOK/DataLKOK/morelkok", $menu);
    }
    public function visiregister($o_id)
    {
        $menu = parent::visiregister($o_id);
        return view("superadmin/LKOK/DataLKOK/registervisi", $menu);
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
        return view("superadmin/LKOK/DataLKOK/registereditvisi", $menu);
    }
    public function misiregister($o_id)
    {
        $menu = parent::misiregister($o_id);
        return view("superadmin/LKOK/DataLKOK/registermisi", $menu);
    }
    public function misiregisterproses()
    {
        return parent::misiregisterproses();
    }
    public function misiedit($o_id)
    {
        $menu = parent::misiedit($o_id);
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("superadmin/LKOK/DataLKOK/registereditmisi", $menu);
    }
    public function registerLKOK()
    {
        $menu = parent::LKOK();
        return view("superadmin/LKOK/DataLKOK/registerlkok", $menu);
    }
    public function registerLKOKprocess()
    {
        return parent::registerLKOKprocess();
    }
    public function editLKOK($o_id)
    {
        $menu = parent::editLKOK($o_id);
        // Pengecekan validasi data
        if ($menu instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $menu; // Mengembalikan RedirectResponse jika validasi tidak berhasil
        }
        return view("superadmin/LKOK/DataLKOK/registereditlkok", $menu);
    }
    public function deleteLKOK($o_id)
    {
        return parent::deleteLKOK($o_id);
    }
    public function listdataanggotaLKOK()
    {
        $menu = parent::listdataanggotaLKOK();
        return view("superadmin/LKOK/DataAnggotaLKOK/dataanggotalkok", $menu);
    }
    public function registeranggotaLKOK()
    {
        $menu = parent::registeranggotaLKOK();
        return view("superadmin/LKOK/DataAnggotaLKOK/registeranggotalkok", $menu);
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
        return view("superadmin/LKOK/DataAnggotaLKOK/registereditanggotalkok", $menu);
    }
    public function deleteanggotaLKOK($ao_id)
    {
        return parent::deleteanggotaLKOK($ao_id);
    }
    public function listdataevent()
    {
        $menu = parent::listdataevent();
        return view("superadmin/Event/dataevent", $menu);
    }
    public function registerevent()
    {
        $menu = parent::registerevent();
        return view("superadmin/Event/registerevent", $menu);
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
        return view("superadmin/Event/registereditevent", $menu);
    }
    public function deleteevent($k_id)
    {
        return parent::deleteevent($k_id);
    }
    public function approved($k_id)
    {
        return  parent::approved($k_id);
    }

    public function viewevent()
    {
        $menu = parent::viewevent();
        return view("superadmin/Event/viewevent", $menu);
    }
    public function vieweventbyid($k_id)
    {
        $menu = parent::vieweventbyid($k_id);
        return view("superadmin/Event/vieweventbyid", $menu);
    }
}
