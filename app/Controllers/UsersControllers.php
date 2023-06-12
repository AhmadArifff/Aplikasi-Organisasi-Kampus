<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\ProdiModels;
use App\Models\OrganisasiModels;
use App\Models\AnggotaOrganisasiModels;
use App\Models\KegiatanModels;
use App\Models\PengambilanOrganisasiModels;
use App\Models\VisiModels;
use App\Models\MisiModels;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request ,$post, $load
 */


class UsersControllers extends BaseController
{
    protected $UsersModels;
    protected $ProdiModels;
    protected $OrganisasiModels;
    protected $AnggotaOrganisasiModels;
    protected $KegiatanModels;
    protected $PengambilanOrganisasiModels;
    protected $VisiModels;
    protected $MisiModels;
    public function __construct()
    {
        if (session()->get('u_role') != $this->getUserRole()) {
            echo 'Access denied';
            exit;
        }
        $this->UsersModels = new UsersModels();
        $this->ProdiModels = new ProdiModels();
        $this->OrganisasiModels = new OrganisasiModels();
        $this->AnggotaOrganisasiModels = new AnggotaOrganisasiModels();
        $this->KegiatanModels = new KegiatanModels();
        $this->PengambilanOrganisasiModels = new PengambilanOrganisasiModels();
        $this->VisiModels = new VisiModels();
        $this->MisiModels = new MisiModels();
    }
    protected function getUserRole()
    {
        // Metode ini akan diimplementasikan di setiap kelas turunan
        return '';
    }
    public function Prodi()
    {
        $u_id = $this->request->getPost('u_id');
        $datauser = $this->UsersModels->getuser_u_id($u_id);
        echo '<option value="">----Pilih Fakultas---- </option>';
        foreach ($datauser as $value => $k) {
            $p_id = $k['u_prodi'];
            $dataprodi = $this->ProdiModels->getprodi_p_id($p_id);
            foreach ($dataprodi as $item) {
                echo "<option value=" . $item['p_id'] . ">" . $item['p_nama'] . "</option>";
            }
        }
    }
    public function dashboard()
    {
        $menu = [
            'Dashboard' => 'dashboard',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function Users()
    {
        $menu = [
            'Dashboard' => '',
            'User' => 'user',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => '',
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_user' => $this->UsersModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function registeruserprocess()
    {
        if (!$this->validate([
            'u_npm' => [
                'rules' => 'required|min_length[4]|max_length[12]|is_unique[tb_user.u_npm]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 12 Karakter',
                    'is_unique' => 'NPM sudah digunakan sebelumnya'
                ]
            ],
            'u_password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password-confirm' => [
                'rules' => 'matches[u_password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'u_nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'u_role' => 'required',
            'u_gender' => 'required',
            'u_prodi' => 'required',
            'u_angkatan' => 'required',
            'u_alamat' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->UsersModels->insert([
            'u_npm' => $this->request->getVar('u_npm'),
            'u_password' => password_hash($this->request->getVar('u_password'), PASSWORD_BCRYPT),
            'u_nama' => $this->request->getVar('u_nama'),
            'u_role' => $this->request->getVar('u_role'),
            'u_gender' => $this->request->getVar('u_gender'),
            'u_prodi' => $this->request->getVar('u_prodi'),
            'u_angkatan' => $this->request->getVar('u_angkatan'),
            'u_alamat' => $this->request->getVar('u_alamat'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        return redirect()->to('/SuperAdmin/datauser');
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        $validation = \Config\Services::validation();
        $validation->setRules([
            'u_npm' => 'required',
            'u_password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password-confirm' => [
                'rules' => 'matches[u_password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'u_nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'u_role' => 'required',
            'u_gender' => 'required',
            'u_prodi' => 'required',
            'u_angkatan' => 'required',
            'u_alamat' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $this->UsersModels->update($u_id, [
                'u_npm' => $this->request->getVar('u_npm'),
                'u_password' => password_hash($this->request->getVar('u_password'), PASSWORD_BCRYPT),
                'u_nama' => $this->request->getVar('u_nama'),
                'u_role' => $this->request->getVar('u_role'),
                'u_gender' => $this->request->getVar('u_gender'),
                'u_prodi' => $this->request->getVar('u_prodi'),
                'u_angkatan' => $this->request->getVar('u_angkatan'),
                'u_alamat' => $this->request->getVar('u_alamat'),
            ]);
            session()->setFlashdata('success', 'Data Berhasil Di Edit!');
            return redirect()->route('superadmin.listdatauser');
        }
        return $menu;
    }
    public function deleteuser($u_id)
    {
        try {
            $result = $this->UsersModels->delete($u_id);
            if ($result) {
                session()->setFlashdata('success', 'Data Berhasil Di Hapus!');
            } else {
                session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus!');
            }
        } catch (\mysqli_sql_exception $e) {
            session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di:
        <br>1. <b>Anggota LK/OK</b> Sebagai <b>Nama Pengguna</b>!
        <br>2. <b>Anggota LK/OK</b> sebagai <b>Nama Pengguna</b>!
        <br>2. <b>Event</b> sebagai <b>Nama Pengguna</b>!
        <br>Silahkan Cek Data ini yang kemungkinan sudah dipakai di <b>3 form diatas</b>, jika ada maka hapus terlebih dahulu dan apabila sudah tidak ada maka Data ini yang mau dihapus dapat dilakukan!');
        }
        return redirect()->route('superadmin.listdatauser');
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
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
            return redirect()->route('superadmin.listdatafakultas');
        }
        return $menu;
    }
    public function deletefakultas($p_id)
    {
        try {
            $result = $this->ProdiModels->delete($p_id);
            if ($result) {
                session()->setFlashdata('success', 'Data Berhasil Di Hapus!');
            } else {
                session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus!');
            }
        } catch (\mysqli_sql_exception $e) {
            session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di:
            <br>1. <b>Users</b> Sebagai <b>Nama Prodi</b>!
            <br>1. <b>Anggota LK/OK</b> Sebagai <b>Nama Prodi</b>!
            <br>2. <b>Event</b> sebagai <b>Nama Prodi</b>!
            <br>Silahkan Cek Data ini yang kemungkinan sudah dipakai di <b>3 form diatas</b>, jika ada maka hapus terlebih dahulu dan apabila sudah tidak ada maka Data ini yang mau dihapus dapat dilakukan!');
        }
        return redirect()->route('superadmin.listdatafakultas');
    }
    public function LKOK()
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function morelkok($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
            'tb_pengambilanorganisasi' => $this->PengambilanOrganisasiModels->findAll(),
            'tb_visi' => $this->VisiModels->findAll(),
            'tb_misi' => $this->MisiModels->findAll(),
            'tb_user' => $this->UsersModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function visiregister($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'tb_visi' => $this->VisiModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function visiregisterproses()
    {
        if (!$this->validate([
            'v_ke1' => 'required',
            'v_ke2' => 'required',
            'v_ke3' => 'required',
            'v_ke4' => 'required',
            'v_ke5' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->VisiModels->insert([
            'o_id' => $this->request->getVar('o_id'),
            'v_ke1' => $this->request->getVar('v_ke1'),
            'v_ke2' => $this->request->getVar('v_ke2'),
            'v_ke3' => $this->request->getVar('v_ke3'),
            'v_ke4' => $this->request->getVar('v_ke4'),
            'v_ke5' => $this->request->getVar('v_ke5')
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        return redirect()->back();
    }
    public function visiedit($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->find($o_id),
            'tb_visi_o_id' => $this->VisiModels->where('o_id', $o_id)->first(),
            'tb_visi' => $this->VisiModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'v_ke1' => 'required',
            'v_ke2' => 'required',
            'v_ke3' => 'required',
            'v_ke4' => 'required',
            'v_ke5' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $existingVisi = $this->VisiModels->where('o_id', $o_id)->first();
            if ($existingVisi) {
                $this->VisiModels->update($existingVisi['v_id'], [
                    'v_ke1' => $this->request->getVar('v_ke1'),
                    'v_ke2' => $this->request->getVar('v_ke2'),
                    'v_ke3' => $this->request->getVar('v_ke3'),
                    'v_ke4' => $this->request->getVar('v_ke4'),
                    'v_ke5' => $this->request->getVar('v_ke5')
                ]);
                session()->setFlashdata('success', 'Data Berhasil Di Edit!');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Tidak ada data yang cocok untuk diupdate.');
                return redirect()->back();
            }
        }
        return $menu;
    }


    public function misiregister($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'tb_visi' => $this->VisiModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function misiregisterproses()
    {
        if (!$this->validate([
            'm_ke1' => 'required',
            'm_ke2' => 'required',
            'm_ke3' => 'required',
            'm_ke4' => 'required',
            'm_ke5' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->MisiModels->insert([
            'o_id' => $this->request->getVar('o_id'),
            'm_ke1' => $this->request->getVar('m_ke1'),
            'm_ke2' => $this->request->getVar('m_ke2'),
            'm_ke3' => $this->request->getVar('m_ke3'),
            'm_ke4' => $this->request->getVar('m_ke4'),
            'm_ke5' => $this->request->getVar('m_ke5')
        ]);
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        return redirect()->back();
    }
    public function misiedit($o_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'Event' => '',
            'LKOK' => 'lkok',
            'DataLKOK' => 'datalkok',
            'DataAnggotaLKOK' => '',
            'tb_organisasi' => $this->OrganisasiModels->where('o_id', $o_id)->first(),
            'tb_misi_o_id' => $this->MisiModels->where('o_id', $o_id)->first(),
            'tb_misi' => $this->MisiModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'm_ke1' => 'required',
            'm_ke2' => 'required',
            'm_ke3' => 'required',
            'm_ke4' => 'required',
            'm_ke5' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $existingMisi = $this->MisiModels->where('o_id', $o_id)->first();
            if ($existingMisi) {
                $this->MisiModels->update($existingMisi['m_id'], [
                    'm_ke1' => $this->request->getVar('m_ke1'),
                    'm_ke2' => $this->request->getVar('m_ke2'),
                    'm_ke3' => $this->request->getVar('m_ke3'),
                    'm_ke4' => $this->request->getVar('m_ke4'),
                    'm_ke5' => $this->request->getVar('m_ke5')
                ]);
                session()->setFlashdata('success', 'Data Berhasil Di Edit!');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Tidak ada data yang cocok untuk diupdate.');
                return redirect()->back();
            }
        }
        return $menu;
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
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
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
            session()->setFlashdata('success', 'Data Berhasil Di Edit!');
            return redirect()->route('superadmin.listdataLKOK');
        }
        return $menu;
    }
    public function deleteLKOK($o_id)
    {
        try {
            $result = $this->OrganisasiModels->delete($o_id);
            if ($result) {
                session()->setFlashdata('success', 'Data Berhasil Di Hapus!');
            } else {
                session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus!');
            }
        } catch (\mysqli_sql_exception $e) {
            session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di:
            <br>1. <b>Anggota LK/OK</b> Sebagai <b>Nama Organisasi</b>!
            <br>Silahkan Cek Data ini yang kemungkinan sudah dipakai di <b>1 form diatas</b>, jika ada maka hapus terlebih dahulu dan apabila sudah tidak ada maka Data ini yang mau dihapus dapat dilakukan!');
        }
        return redirect()->route('superadmin.listdataLKOK');
    }
    public function listdataanggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
            'tb_pengambilan_organisasi' => $this->PengambilanOrganisasiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function registeranggotaLKOK()
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function registeranggotaLKOKprocess()
    {
        if (!$this->validate([
            'u_id' => 'required',
            'p_id' => 'required',
            'o_id' => 'required',
            'ao_staf' => 'required',
            'ao_foto' => [
                'rules' => 'uploaded[ao_foto]|max_size[ao_foto,1024]|mime_in[ao_foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} Maksimal 1024 KB ',
                    'mime_in' => 'Format {field} harus JPG/JPEG/PNG!',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $foto = $this->request->getFile('ao_foto');
        $nama_file = $foto->getRandomName();
        $this->AnggotaOrganisasiModels->insert([
            'u_id' => $this->request->getVar('u_id'),
            'p_id' => $this->request->getVar('p_id'),
            'ao_staf' => $this->request->getVar('ao_staf'),
            'ao_foto' => $nama_file
        ]);
        $foto->move('Anggota-LKOK', $nama_file);
        $data_organisasi_diikuti = $this->request->getVar('o_id');
        foreach ($data_organisasi_diikuti as $idorganisasi) {
            $this->PengambilanOrganisasiModels->insert([
                'ao_id' => $this->AnggotaOrganisasiModels->getInsertID(),
                'o_id' => $idorganisasi
            ]);
        }

        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        if (session()->get('u_role') == "SuperAdmin") {
            return redirect()->to('/SuperAdmin/dataanggotaLK-OK');
        } else if (session()->get('u_role') == "AdminLK/OK") {
            return redirect()->to('/AdminLK-OK/dataanggotaLK-OK');
        }
    }

    public function editanggotaLKOK($ao_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => 'lkok',
            'Event' => '',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_organisasi' => $this->OrganisasiModels->findAll(),
            'tb_pengambilan_organisasi' => $this->PengambilanOrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->where('ao_id', $ao_id)->first(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => 'dataanggotalkok',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        $validation = \Config\Services::validation();
        $validation->setRules([
            'u_id' => 'required',
            'p_id' => 'required',
            'o_id' => 'required',
            'ao_staf' => 'required',
            'ao_foto' => [
                'rules' => 'max_size[ao_foto,1024]|mime_in[ao_foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} Maksimal 1024 KB ',
                    'mime_in' => 'Format {field} harus JPG/JPEG/PNG!',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $foto = $this->request->getFile('ao_foto');
            $prefoto = $this->request->getVar('preview');
            if ($foto->getError() == 4) {
                $nama_file = $prefoto;
            } else {
                $nama_file = $foto->getRandomName();
                if ($prefoto != '') {
                    unlink('Anggota-LKOK/' . $prefoto);
                }
                $foto->move('Anggota-LKOK', $nama_file);
            }
            $this->AnggotaOrganisasiModels->update($ao_id, [
                'u_id' => $this->request->getVar('u_id'),
                'p_id' => $this->request->getVar('p_id'),
                'ao_staf' => $this->request->getVar('ao_staf'),
                'ao_foto' => $nama_file
            ]);
            $data_organisasi = $this->OrganisasiModels->findAll();
            $o_id = $this->request->getVar('o_id');
            $this->AnggotaOrganisasiModels->deleteanggota_by_ao_id($ao_id);

            foreach ($o_id as $data_by_o_id) {
                foreach ($data_organisasi as $tb_organisasi) {
                    if ($data_by_o_id == $tb_organisasi['o_id']) {
                        $id_organisasi = $tb_organisasi['o_id'];
                    }
                }
                $this->PengambilanOrganisasiModels->insert([
                    'ao_id' => $ao_id,
                    'o_id' => $id_organisasi
                ]);
            }
            session()->setFlashdata('success', 'Data Berhasil Di Edit!');
            if (session()->get('u_role') == "SuperAdmin") {
                return redirect()->route('superadmin.listdataanggotaLKOK');
            } else if (session()->get('u_role') == "AdminLK/OK") {
                return redirect()->route('admin.listdataanggotaLKOK');
            }
        }
        return $menu;
    }
    public function deleteanggotaLKOK($ao_id)
    {
        $unlinkfotobyid = $this->AnggotaOrganisasiModels->dataanggotaorganisasibyid($ao_id);
        unlink('Anggota-LKOK/' . $unlinkfotobyid['ao_foto']);
        try {
            $this->PengambilanOrganisasiModels->delete_pengambilan_organisasi_by_ao_id($ao_id);
            $result = $this->AnggotaOrganisasiModels->delete($ao_id);
            if ($result) {
                session()->setFlashdata('success', 'Data Berhasil Di Hapus!');
            } else {
                session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus!');
            }
        } catch (\mysqli_sql_exception $e) {
        }
        if (session()->get('u_role') == "SuperAdmin") {
            return redirect()->route('superadmin.listdataanggotaLKOK');
        } else if (session()->get('u_role') == "AdminLK/OK") {
            return redirect()->route('admin.listdataanggotaLKOK');
        }
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
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
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return $menu;
    }
    public function registereventprocess()
    {
        if (!$this->validate([
            'u_id' => 'required',
            'p_id' => 'required',
            'k_nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'k_jeniskegiatan' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'k_deskripsikegiatan' => [
                'rules' => 'required|min_length[4]|max_length[1000]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 1000 Karakter',
                ]
            ],
            'k_foto' => [
                'rules' => 'uploaded[k_foto]|max_size[k_foto,2024]|mime_in[k_foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} Maksimal 2024 KB ',
                    'mime_in' => 'Format {field} harus JPG/JPEG/PNG!',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $foto = $this->request->getFile('k_foto');
        $nama_file = $foto->getRandomName();
        $this->KegiatanModels->insert([
            'u_id' => $this->request->getVar('u_id'),
            'p_id' => $this->request->getVar('p_id'),
            'k_nama' => $this->request->getVar('k_nama'),
            'k_jeniskegiatan' => $this->request->getVar('k_jeniskegiatan'),
            'k_deskripsikegiatan' => $this->request->getVar('k_deskripsikegiatan'),
            'k_foto' => $nama_file
        ]);
        $foto->move('Event', $nama_file);
        session()->setFlashdata('success', 'Data Berhasil Disimpan!');
        if (session()->get('u_role') == "SuperAdmin") {
            return redirect()->to('/SuperAdmin/dataevent');
        } else if (session()->get('u_role') == "AdminLK/OK") {
            return redirect()->to('/AdminLK-OK/dataevent');
        }
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
            'tb_kegiatan' => $this->KegiatanModels->where('k_id', $e_id)->first(),
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        $validation = \Config\Services::validation();
        $validation->setRules([
            'u_id' => 'required',
            'p_id' => 'required',
            'k_nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'k_jeniskegiatan' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'k_deskripsikegiatan' => [
                'rules' => 'required|min_length[4]|max_length[1000]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 1000 Karakter',
                ]
            ],
            'k_foto' => [
                'rules' => 'max_size[k_foto,2024]|mime_in[k_foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} Maksimal 2024 KB ',
                    'mime_in' => 'Format {field} harus JPG/JPEG/PNG!',
                ]
            ],
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $foto = $this->request->getFile('k_foto');
            $prefoto = $this->request->getVar('preview');
            if ($foto->getError() == 4) {
                $nama_file = $prefoto;
            } else {
                $nama_file = $foto->getRandomName();
                if ($prefoto != '') {
                    unlink('Event/' . $prefoto);
                }
                $foto->move('Event', $nama_file);
            }
            $this->KegiatanModels->update($e_id, [
                'u_id' => $this->request->getVar('u_id'),
                'p_id' => $this->request->getVar('p_id'),
                'k_nama' => $this->request->getVar('k_nama'),
                'k_jeniskegiatan' => $this->request->getVar('k_jeniskegiatan'),
                'k_deskripsikegiatan' => $this->request->getVar('k_deskripsikegiatan'),
                'k_foto' => $nama_file
            ]);
            session()->setFlashdata('success', 'Data Berhasil Di Edit!');
            if (session()->get('u_role') == "SuperAdmin") {
                return redirect()->route('superadmin.listdataevent');
            } else if (session()->get('u_role') == "AdminLK/OK") {
                return redirect()->route('admin.listdataevent');
            }
        }
        return $menu;
    }
    public function deleteevent($k_id)
    {
        $unlinkfotobyid = $this->KegiatanModels->dataeventbyid($k_id);
        unlink('Event/' . $unlinkfotobyid['k_foto']);
        try {
            $result = $this->KegiatanModels->delete($k_id);
            if ($result) {
                session()->setFlashdata('success', 'Data Berhasil Di Hapus!');
            } else {
                session()->setFlashdata('error', 'Data Tidak Berhasil Di Hapus!');
            }
        } catch (\mysqli_sql_exception $e) {
        }
        if (session()->get('u_role') == "SuperAdmin") {
            return redirect()->route('superadmin.listdataevent');
        } else if (session()->get('u_role') == "AdminLK/OK") {
            return redirect()->route('admin.listdataevent');
        }
    }
    public function approved($k_id)
    {
        if ($k_id != null) {
            $this->KegiatanModels->update($k_id, [
                'k_check_u_id' => session()->get('u_id')
            ]);
            return redirect()->back();
        }
        return redirect()->back();
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
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
    public function vieweventbyid($k_id)
    {
        $menu = [
            'Dashboard' => '',
            'User' => '',
            'Fakultas' => '',
            'LKOK' => '',
            'Event' => 'event',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
            'tb_event_k_id' => $this->KegiatanModels->where('k_id', $k_id)->first(),
            'NotipEvent' => $this->KegiatanModels->findAll(),
            'NotipUser' => $this->UsersModels->findAll(),
            'Notiprodi' => $this->ProdiModels->findAll(),
        ];
        return $menu;
    }
}
