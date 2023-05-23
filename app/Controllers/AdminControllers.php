<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\AnggotaOrganisasiModels;
use App\Models\KecamatanModels;
use App\Models\ProvinsiModels;
use App\Models\BarangModels;
use App\Models\DataItemBarangModels;
use App\Models\PackingBarangModels;
use App\Models\PeriodePembayaranModels;
use App\Models\PaketBarangModels;
use App\Models\TransaksiModels;
use App\Models\CicilanModels;
use App\Models\LogCicilanModels;
use App\Models\LogCicilanSementaraModels;
use App\Models\PengambilanPaketBarangModels;
use App\Models\PengambilanTransaksiPaketBarangModels;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request ,$post, $load
 */




class AdminControllers extends BaseController
{
    public function __construct()
    {
        if (session()->get('u_role') != "admin") {
            echo 'Access denied';
            exit;
        }
        // $this->load->library('select2');
    }
    
    
}
