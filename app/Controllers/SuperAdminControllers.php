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
    protected $OrganisasiModels;
    protected $AnggotaOrganisasiModels;
    protected $KegiatanModels;
    public function __construct()
    {
        if (session()->get('u_role') != "SuperAdmin") {
            echo 'Access denied';
            exit;
        }
        // $this->load->library('select2');
        $this->UsersModels = new UsersModels();
        $this->ProdiModels = new ProdiModels();
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
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => 'dataangggotalkok',
        ];
        return view("superadmin/dashboard", $menu);
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
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => 'dataangggotalkok',
        ];
        return view("superadmin/Datauser/datauser", $menu);
    }
    public function registeruser()
    {
        $menu = [
            'Dashboard' => '',
            'User' => 'user',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Datauser/registeruser", $menu);
    }
    public function edituser($u_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => 'user',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_user' => $this->UsersModels->where('u_id', $u_id)->first(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Datauser/registeredituser", $menu);
    }
    public function listdatafakultas()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => 'fakultas',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/DataFakultas/datafakultas", $menu);
    }
    public function registerfakultas()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => 'fakultas',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/DataFakultas/registerfakultas", $menu);
    }
    public function registerfakultasprocess()
    {
        if (!$this->validate([
            'p_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->ProdiModels->insert([
            'p_nama' => $this->request->getVar('p_nama')
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        return redirect()->to('/SuperAdmin/datafakultas');
    }
    public function editfakultas($p_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => 'fakultas',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->where('p_id', $p_id)->first(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        // $menu['tb_prodi'] = $this->ProdiModels->where('p_id', $p_id)->first();
        // lakukan validasi data artikel
        $validation = \Config\Services::validation();
        $validation->setRules([
            'p_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->ProdiModels->update($p_id, [
                'p_nama' => $this->request->getVar('p_nama')
            ]);
            session()->setFlashdata('success', 'Data Berhasil Di Edit!');
            return redirect('SuperAdmin/datafakultas');
        }
        return view("superadmin/DataFakultas/registereditfakultas", $menu);
    }
    public function listdataLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/LKOK/DataLKOK/datalkok", $menu);
    }
    public function morelkok()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/LKOK/DataLKOK/morelkok", $menu);
    }
    public function registerLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/LKOK/DataLKOK/registerlkok", $menu);
    }
    public function registerLKOKprocess()
    {
        if (!$this->validate([
            'o_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->OrganisasiModels->insert([
            'o_nama' => $this->request->getVar('o_nama')
        ]);
        session()->setFlashdata('success', 'Data LKOK Berhasil Disimpan!');
        return redirect()->to('/SuperAdmin/dataLK-OK');
    }
    public function editLKOK($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
        ];
        $validation = \Config\Services::validation();
        $validation->setRules([
            'o_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->OrganisasiModels->update($o_id, [
                'o_nama' => $this->request->getVar('o_nama')
            ]);
            session()->setFlashdata('success', 'Data LKOK Berhasil Di Edit!');
            return redirect('SuperAdmin/datafakultas');
        
    }
    return view("superadmin/LKOK/DataLKOK/registereditlkok", $menu);
}   

    public function deleteLKOK($o_id)
    {
    $menu = [
        'Dashboard' => '',
        'User' => '',
        'Fakultas' => '',
        'LKOK' => 'lkok',
        'Event' => '',
        'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
        'DataLKOK' => 'datalkok',
        'DataAnggotaLKOK' => '',
    ];
    
        $this->OrganisasiModels->delete($o_id);
        session()->setFlashdata('success', 'Data LKOK Berhasil Di Hapus!');
        return redirect('SuperAdmin/dataLK-OK');
    return view("superadmin/LKOK/DataLKOK/registereditlkok", $menu);
}

    public function listdataanggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
        ];
        return view("superadmin/LKOK/DataAnggotaLKOK/dataanggotalkok", $menu);
    }
    public function registeranggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
        ];
        return view("superadmin/LKOK/DataAnggotaLKOK/registeranggotalkok", $menu);
    }

    public function registeranggotaLKOKprocess()
    {
        $this->AnggotaOrganisasiModels->insert([
            'u_id' => $this->request->getVar('u_id'),
            'p_id' => $this->request->getVar('p_id'),
            'ao_staf' => $this->request->getVar('u_role'),
            'o_id' => $this->request->getVar('p_id'),
            'p_foto' => $this->request->getVar('p_foto'),
            
        ]);
        session()->setFlashdata('success', 'Data Anggota LKOK Berhasil Disimpan!');
        return redirect()->to('/superadmin/LKOK/DataAnggotaLKOK');
    }


    public function editanggotaLKOK($ao_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'DataLKOK' => '',
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->where('ao_id', $ao_id)->first(),
            'DataAnggotaLKOK' => 'dataanggotalkok',
        ];

        $this->AnggotaOrganisasiModels->update($o_id, [
            'o_nama' => $this->request->getVar('o_nama')
        ]);
        session()->setFlashdata('success', 'Data LKOK Berhasil Di Edit!');
        return view("superadmin/LKOK/DataAnggotaLKOK/registereditanggotalkok", $menu);
    }
    public function listdataevent()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => 'event',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Event/dataevent", $menu);
    }
    public function registerevent()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => 'event',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Event/registerevent", $menu);
    }
    public function editevent($e_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => 'event',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'tb_kegiatan' => $this->KegiatanModels->where('k_id', $e_id)->first(),
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Event/registereditevent", $menu);
    }
    public function viewevent()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => 'event',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("superadmin/Event/viewevent", $menu);
    }
}