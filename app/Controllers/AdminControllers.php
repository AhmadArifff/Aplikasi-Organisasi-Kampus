<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\ProdiModels;
use App\Models\OrganisasiModels;
use App\Models\AnggotaOrganisasiModels;
use App\Models\KegiatanModels;
use App\Models\PengambilanOrganisasiModels;
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
    protected $PengambilanOrganisasiModels;
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
        $this->PengambilanOrganisasiModels = new PengambilanOrganisasiModels();
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
            'Event' => '',
            'LKOK' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
        ];
        return view("admin/dashboard", $menu);
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
        return view("admin/LKOK/DataLKOK/datalkok", $menu);
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
            'tb_user' => $this->UsersModels->findAll(),
        ];
        return view("admin/LKOK/DataLKOK/morelkok", $menu);
    }
    public function listdataanggotaLKOK()
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
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->findAll(),
            'tb_pengambilan_organisasi' => $this->PengambilanOrganisasiModels->findAll(),
        ];
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
        return redirect()->to('/AdminLK-OK/dataanggotaLK-OK');
    }
    public function editanggotaLKOK($ao_id)
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
            'tb_pengambilan_organisasi' => $this->PengambilanOrganisasiModels->findAll(),
            'tb_anggotaorganisasi' => $this->AnggotaOrganisasiModels->where('ao_id', $ao_id)->first(),
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
            return redirect('AdminLK-OK/dataanggotaLK-OK');
        }
        return view("admin/LKOK/DataAnggotaLKOK/registereditanggotalkok", $menu);
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
        return redirect()->to('/AdminLK-OK/dataanggotaLK-OK');
    }
    public function listdataevent()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'LKOK' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
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
            'LKOK' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
        ];
        return view("admin/Event/registerevent", $menu);
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
        return redirect()->to('/AdminLK-OK/dataevent');
    }
    public function editevent($e_id)
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'LKOK' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'tb_user' => $this->UsersModels->getuserno_superadmin(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_kegiatan' => $this->KegiatanModels->where('k_id', $e_id)->first(),
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
            return redirect('AdminLK-OK/dataevent');
        }
        return view("admin/Event/registereditevent", $menu);
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
        return redirect()->to('/AdminLK-OK/dataevent');
    }
    public function viewevent()
    {
        $menu = [
            'Dashboard' => '',
            'Event' => 'event',
            'LKOK' => '',
            'DataLKOK' => '',
            'DataAnggotaLKOK' => '',
            'tb_user' => $this->UsersModels->findAll(),
            'tb_prodi' => $this->ProdiModels->findAll(),
            'tb_event' => $this->KegiatanModels->findAll(),
        ];
        return view("admin/Event/viewevent", $menu);
    }
}
