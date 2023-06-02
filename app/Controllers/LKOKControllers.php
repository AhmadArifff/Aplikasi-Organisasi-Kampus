<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LKOKModels;

class LkokControllers extends BaseController
{
    protected $lkokModels;

    public function __construct()
    {
        $LKOKModels = new LKOKModels();
    }

    public function index()
    {
        $data = $this->LKOKModels->getLkok();
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getVar();
        $this->LKOKModels->createLkok($data);
        session()->setFlashdata('success', 'LKOK Telah Dibuat');
        return redirect()->to('/SuperAdmin/dataLK-OK');
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $this->LKOKModels->updateLkok($id, $data);
        return $this->respond(['status' => 'success', 'message' => 'LKOK Telah Update']);
    }

    public function delete($id = null)
    {
        $this->LKOKModels->deleteLkok($id);
        return $this->respond(['status' => 'success', 'message' => 'LKOK Dihapus']);
    }
}
