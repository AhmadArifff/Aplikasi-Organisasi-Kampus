<?php

namespace App\Controllers;

use App\Models\UsersModels;
use App\Models\TransaksiModels;
use App\Models\CicilanModels;
use App\Models\LogCicilanModels;
use App\Models\LogCicilanSementaraModels;
use App\Models\PaketBarangModels;
use App\Models\PengambilanPaketBarangModels;
use App\Models\PengambilanTransaksiPaketBarangModels;
use CodeIgniter\RESTful\ResourceController;

class RestApiCoordinator extends ResourceController
{
    protected $format = 'json';
    protected $UsersModels;
    protected $Transaksi;
    protected $Cicilan;
    protected $Logcicilan;
    protected $LogcicilanSementara;
    protected $PaketBarang;
    protected $PengambilanPaket;
    protected $PengambilanTransaksiPaketBarang;

    public function __construct()
    {
        $this->UsersModels = new UsersModels();
        $this->Transaksi =  new TransaksiModels();
        $this->Cicilan =  new CicilanModels();
        $this->Logcicilan =  new LogCicilanModels();
        $this->LogcicilanSementara =  new LogCicilanSementaraModels();
        $this->PaketBarang = new PaketBarangModels();
        $this->PengambilanPaket = new PengambilanPaketBarangModels();
        $this->PengambilanTransaksiPaketBarang = new PengambilanTransaksiPaketBarangModels();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }
    // Database User
    public function listdatauser()
    {
        $datbaseUser = $this->UsersModels->findAll();

        if (empty($datbaseUser)) {
            $data = [
                'message' => 'Error Not get DatabaseUser'
            ];
        } else {
            $data = [
                'message' => 'success',
                'DatabaseUser' => $datbaseUser
            ];
        }

        return $this->respond($data);
    }
    public function registeruserprocess()
    {
        $rules = $this->validate([
            'u_username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tb_user.u_username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
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
            'u_fullname' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_role' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'u_referensi' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'u_email' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_create_at' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_nik' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_tempat_lahir' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_tanggal_lahir' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_jenis_kelamin' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_provinsi' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kelurahan' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kecamatan' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kodepos' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ]);
        if (!$rules) {
            $respond = ['message' => $this->validator->getErrors()];
            return $this->failValidationErrors($respond);
        }
        $u_id = session('u_id');
        $this->UsersModels->insert([
            'u_username' => esc($this->request->getVar('u_username')),
            'u_password' => esc(password_hash($this->request->getVar('u_password'), PASSWORD_BCRYPT)),
            'u_fullname' => esc(strtoupper($this->request->getVar('u_fullname'))),
            'u_role' => esc($this->request->getVar('u_role')),
            // 'u_referensi' => esc($u_id),
            'u_referensi' => esc($this->request->getVar('u_referensi')),
            'u_email' => esc($this->request->getVar('u_email')),
            'u_create_at' => esc($this->request->getVar('u_create_at')),
            'u_nik' => esc($this->request->getVar('u_nik')),
            'u_nama' => esc(strtoupper($this->request->getVar('u_nama'))),
            'u_tempat_lahir' => esc($this->request->getVar('u_tempat_lahir')),
            'u_tanggal_lahir' => esc($this->request->getVar('u_tanggal_lahir')),
            'u_jenis_kelamin' => esc($this->request->getVar('u_jenis_kelamin')),
            'u_provinsi' => esc($this->request->getVar('u_provinsi')),
            'u_kota' => esc($this->request->getVar('u_kota')),
            'u_kelurahan' => esc($this->request->getVar('u_kelurahan')),
            'u_kecamatan' => esc($this->request->getVar('u_kecamatan')),
            'u_kodepos' => esc($this->request->getVar('u_kodepos'))
        ]);
        $respond = ['message' => 'Data Berhasil Di Tambahkan!'];
        return $this->respondCreated($respond);
    }
    public function edituser($id = null)
    {
        $rules = $this->validate([
            'u_username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
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
            'u_fullname' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_role' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'u_referensi' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'u_email' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_create_at' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_nik' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_nama' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_tempat_lahir' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_tanggal_lahir' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_jenis_kelamin' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_provinsi' => [
                'rules' => 'required|min_length[1]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kelurahan' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kecamatan' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'u_kodepos' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ]);
        if (!$rules) {
            $respond = ['message' => $this->validator->getErrors()];
            return $this->failValidationErrors($respond);
        }
        $u_id = session()->get('u_id');
        $this->UsersModels->update($id, [
            'u_username' => esc($this->request->getVar('u_username')),
            'u_password' => esc(password_hash($this->request->getVar('u_password'), PASSWORD_BCRYPT)),
            'u_fullname' => esc(strtoupper($this->request->getVar('u_fullname'))),
            'u_role' => esc($this->request->getVar('u_role')),
            // 'u_referensi' => esc($u_id),
            'u_referensi' => esc($this->request->getVar('u_referensi')),
            'u_email' => esc($this->request->getVar('u_email')),
            'u_create_at' => esc($this->request->getVar('u_create_at')),
            'u_nik' => esc($this->request->getVar('u_nik')),
            'u_nama' => esc(strtoupper($this->request->getVar('u_nama'))),
            'u_tempat_lahir' => esc($this->request->getVar('u_tempat_lahir')),
            'u_tanggal_lahir' => esc($this->request->getVar('u_tanggal_lahir')),
            'u_jenis_kelamin' => esc($this->request->getVar('u_jenis_kelamin')),
            'u_provinsi' => esc($this->request->getVar('u_provinsi')),
            'u_kota' => esc($this->request->getVar('u_kota')),
            'u_kelurahan' => esc($this->request->getVar('u_kelurahan')),
            'u_kecamatan' => esc($this->request->getVar('u_kecamatan')),
            'u_kodepos' => esc($this->request->getVar('u_kodepos'))
        ]);
        $respond = ['message' => 'Data Berhasil Di Update!'];
        return $this->respond($respond, 200);
    }

    public function deleteuser($id = null)
    {
        try {
            $result = $this->UsersModels->delete($id);
            if ($result) {
                $respond = ['message' => 'Data ' . $id . ' Berhasil Di Hapus!'];
            } else {
                $respond = ['message' => 'Data ' . $id . ' Berhasil Tidak Di Hapus!'];
            }
        } catch (\mysqli_sql_exception $e) {
            $respond = ['message' => 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di:
            1. Data UserSebagai referensi Anggota!
            2. Data Transaksi Paket sebagai identitas yang mengambil Paket!
            3. Data Transaksi Cicilan sebagai identitas yang mengambil Paket Cicilan!
            4. Data Transaksi Log Cicilan sebagai identitas yang membayar Paket Cicilan!
            Silahkan Cek Data user yang kemungkinan sudah dipakai di 4 form diatas, jika ada maka hapus terlebih dahulu dan apabila sudah tidak ada maka Data User yang mau dihapus dapat dilakukan!'];
        }
        return $this->respondDeleted($respond);
    }
    // Data Transaksi
    public function listdatatransaksi()
    {
        $datbaseTransaksi = $this->Transaksi->findAll();

        if (empty($datbaseTransaksi)) {
            $data = [
                'message' => 'Error Not get Data Transaksi'
            ];
        } else {
            $data = [
                'message' => 'success',
                'DataTransaksi' => $datbaseTransaksi
            ];
        }

        return $this->respond($data);
    }
    public function transaksiprocess()
    {
        $rules = $this->validate([
            'u_id' => 'required',
            'p_id' => 'required',
            't_qty' => 'required',
        ]);
        if (!$rules) {
            $respond = ['message' => $this->validator->getErrors()];
            return $this->failValidationErrors($respond);
        }
        $u_id = $this->request->getVar('u_id');
        $p_id = $this->request->getVar('p_id');
        $pe_id = $this->request->getVar('pe_id');
        $qty = $this->request->getVar('t_qty');
        $hargapaket = 0;
        $datapaket = $this->PaketBarang->findAll();
        foreach ($datapaket as $tb_paket) {
            if ($p_id == $tb_paket['p_id']) {
                $hargapaket = $tb_paket['p_hargaJual'];
            }
        }
        $total = $hargapaket * $qty;
        $this->Transaksi->insert([
            'u_id' => $u_id,
            'p_id' => $p_id,
            'pe_id' => $pe_id,
            't_qty' => $qty,
            't_totalharga' => $total,
            // 't_status' => $this->request->getVar('t_status')
        ]);
        $datapengambilanpaket = $this->PengambilanPaket->findAll();
        for ($i = 0; $i < $qty; $i++) {
            foreach ($datapengambilanpaket as $tb_pengambilan_paket) {
                if ($p_id == $tb_pengambilan_paket['pp_p_id']) {
                    $pp_p_id = $tb_pengambilan_paket['pp_p_id'];
                    $pp_ib_id = $tb_pengambilan_paket['pp_ib_id'];
                    $pp_qty = $tb_pengambilan_paket['pp_qty'];
                    $pp_ktrg_berat_ukuran = $tb_pengambilan_paket['pp_ktrg_berat_ukuran'];
                    $this->PengambilanTransaksiPaketBarang->insert([
                        'pp_t_id' => $this->Transaksi->getInsertID(),
                        'pp_p_id' => $pp_p_id,
                        'pp_ib_id' => $pp_ib_id,
                        'pp_qty' => $pp_qty,
                        'pp_ktrg_berat_ukuran' => $pp_ktrg_berat_ukuran
                    ]);
                }
            }
        }
        $respond = ['message' => 'Data Berhasil Di Tambahkan!'];
        return $this->respondCreated($respond);
    }
    public function deletetransaksi($id = null)
    {
        try {
            $result = $this->Transaksi->delete($id);
            if ($result) {
                $this->Transaksi->deletetransaksipengambilanpeket($id);
                $respond = ['message' => 'Data ' . $id . ' Berhasil Di Hapus!'];
            } else {
                $respond = ['message' => 'Data ' . $id . ' Tidak Berhasil Di Hapus!'];
            }
        } catch (\mysqli_sql_exception $e) {
            $respond = ['message' => 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di:
            1. Data Transaksi Cicilan Sebagai Data Cicilan Pembayaran Paket!
            2. Data Transaksi Log Cicilan sebagai Data Untuk Pembayaran Setiap Periode Cicilan!'];
        }
        return $this->respondDeleted($respond);
    }
    // Data Transaksi Cicilan
    public function listdatacicilan()
    {
        $datbaseCicilan = $this->Cicilan->findAll();

        if (empty($datbaseCicilan)) {
            $data = [
                'message' => 'Error Not get Data Transaksi Cicilan'
            ];
        } else {
            $data = [
                'message' => 'success',
                'DataTransaksi' => $datbaseCicilan
            ];
        }

        return $this->respond($data);
    }
    public function deletecicilan($id = null)
    {
        $datacicilan = $this->Cicilan->findAll();
        $jumlahby_t_id = [];
        foreach ($datacicilan as $tb_cicilan) {
            if ($id == $tb_cicilan['c_id']) {
                $databy_t_id = $tb_cicilan['t_id'];
            }
            $databy_c_id = $id;
        }
        try {
            $result = $this->Cicilan->delete($databy_c_id);
            if ($result) {
                $datacicilan_by_id = $this->Cicilan->where('t_id', $databy_t_id)->findAll();
                foreach ($datacicilan_by_id as $tb_cicilan_byid) {
                    $jumlahby_t_id[] = $tb_cicilan_byid['t_id'];
                }
                $jumlah_by_c_id = count($jumlahby_t_id);
                if ($jumlah_by_c_id == 0) {
                    $this->Transaksi->update($databy_t_id, [
                        't_approval_by' => null
                    ]);
                }
                $respond = ['message' => 'Data ' . $id . ' Berhasil Di Hapus!'];
            } else {
                $respond = ['message' => 'Data ' . $id . ' Tidak Berhasil Di Hapus!'];
            }
        } catch (\mysqli_sql_exception $e) {
            $respond = ['message' => 'Data Tidak Berhasil Di Hapus! Karena Data ini kemungkinan sudah dipakai di Data Transaksi Log Cicilan sebagai Data Untuk Pembayaran Setiap Periode Cicilan!'];
        }
        return $this->respondDeleted($respond);
    }
    // Data Transaksi Log Cicilan
    public function listdatalogcicilan()
    {
        $datbaseLogcicilanSementara = $this->LogcicilanSementara->findAll();

        if (empty($datbaseLogcicilanSementara)) {
            $data = [
                'message' => 'Error Not get Data Transaksi'
            ];
        } else {
            $data = [
                'message' => 'success',
                'DataTransaksi' => $datbaseLogcicilanSementara
            ];
        }

        return $this->respond($data);
    }
    public function logcicilanprocess()
    {
        $rules = $this->validate([
            'u_id' => 'required',
            'l_jumlah_bayar' => 'required',
            'l_foto' => [
                'rules' => 'uploaded[l_foto]|max_size[l_foto,1024]|mime_in[l_foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => 'Ukuran {field} Maksimal 1024 KB ',
                    'mime_in' => 'Format {field} harus JPG/JPEG/PNG!',
                ]
            ],
        ]);
        if (!$rules) {
            $respond = ['message' => $this->validator->getErrors()];
            return $this->failValidationErrors($respond);
        }
        $l_jumlah_bayar = floatval(str_replace(",", "", $this->request->getVar('l_jumlah_bayar')));
        // Validasi nilai variabel
        if (!is_numeric($l_jumlah_bayar)) {
            echo "Input tidak valid!";
            exit;
        }
        $foto = $this->request->getFile('l_foto');
        $nama_file = $foto->getRandomName();
        $u_id = $this->request->getVar('u_id');
        $c_id = $this->request->getVar('c_id');
        $datacicilan = $this->Transaksi->datacicilanby_id($c_id);
        $datapaket = $this->Transaksi->datapaket();
        foreach ($datacicilan as $tb_cicilan) {
            $p_id = $tb_cicilan['p_id'];
        }
        $datatransaksi = $this->Transaksi->datatransaksi_by_id($p_id);
        foreach ($datatransaksi as $tb_transaksi) {
            $t_qty = $tb_transaksi['t_qty'];
        }
        foreach ($datapaket as $tb_paket) {
            if ($p_id == $tb_paket['p_id']) {
                $p_setoran = $tb_paket['p_setoran'];
            }
        }
        $jumlah_pembayaran_cicilan = $l_jumlah_bayar / $p_setoran;
        // $jumlah_pembayaran_cicilan = $l_jumlah_bayar / ($p_setoran * $t_qty);
        $harga_bayar_cicilan = $l_jumlah_bayar / $jumlah_pembayaran_cicilan;
        $totalbayar = $l_jumlah_bayar / $t_qty;
        // print_r($u_id.'-'.$c_id.'-'.$jumlah_bayar_cicilan.'-'.$jumlah_pembayaran_cicilan);
        // for ($i = 0; $i <= $jumlah_pembayaran_cicilan; $i++) {
        $this->LogcicilanSementara->insert([
            'u_id' => $u_id,
            'c_id' => $c_id,
            'l_jumlah_bayar' => $l_jumlah_bayar,
            'l_jumlah_pembayaran_cicilan' => $jumlah_pembayaran_cicilan,
            'l_foto' => $nama_file
        ]);
        // }
        $foto->move('foto-bukti-pembayaran', $nama_file);
        $respond = ['message' => 'Data Berhasil Di Tambahkan!'];
        return $this->respondCreated($respond);
    }
    public function deletelogcicilan($id = null)
    {
        $this->Logcicilan->deletelogcicilan_l_id_sementara($id);
        $logcicilanfotosementara = $this->LogcicilanSementara->datalogcicilan($id);
        if (!empty($logcicilanfotosementara['l_foto'])) {
            unlink('foto-bukti-pembayaran/' . $logcicilanfotosementara['l_foto']);
        }
        $this->LogcicilanSementara->delete($id);
        $respond = ['message' => 'Data ' . $id . ' Berhasil Di Hapus!'];
        return $this->respondDeleted($respond);
    }
}
