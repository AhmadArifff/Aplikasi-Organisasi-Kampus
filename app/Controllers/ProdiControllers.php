<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProdiController extends BaseController
{
    public function index()
    {
        $model = new ProdiModels();
        $data = $model->getProdi();

        return $this->respond($data);
    }
    public function create()
    {
        $model = new ProdiModels();
        $data = $this->request->getVar('p_nama');
        $model->createProdi($data);

        return $this->respondCreated(['status' => 'success', 'message' => 'Prodi created']);
    }

    public function update($id = null)
    {
        $model = new ProdiModels();
        $data = $this->request->getRawInput();
        $model->updateProdi($id, $data);

        return $this->respond(['status' => 'success', 'message' => 'Prodi updated']);
    }

    public function delete($id = null)
    {
        $model = new ProdiModels();
        $model->deleteProdi($id);

        return $this->respond(['status' => 'success', 'message' => 'Prodi deleted']);
    }
}
