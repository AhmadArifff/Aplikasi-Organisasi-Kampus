<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModels;
use App\Models\PeriodePembayaranModels;
use App\Models\PaketBarangModels;
use App\Models\KabupatenModels;
use App\Models\KecamatanModels;
use App\Models\ProvinsiModels;
use App\Models\TransaksiModels;
use App\Models\CicilanModels;
use App\Models\LogCicilanModels;
use App\Models\LogCicilanSementaraModels;
use App\Models\PengambilanPaketBarangModels;
use App\Models\PengambilanTransaksiPaketBarangModels;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class MahasiswaControllers extends BaseController
{
    public function __construct()
    {
        if (session()->get('u_role') != "mahasiswa") {
            echo 'Access denied';
            exit;
        }
    }
    
    
}
