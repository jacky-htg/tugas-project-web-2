<?php

namespace App\Controllers;

use App\Models\TranskripNilaiModel;

class TranskripNilaiController extends BaseController
{
    protected $transkripNilaiModel;

    public function __construct()
    {
        $this->transkripNilaiModel = new TranskripNilaiModel();
    }

    public function index()
    {
        $data['transkrip_nilai'] = $this->transkripNilaiModel->findAll();

        return view('list_transkrip_nilai', $data);
    }

    public function delete($id)
    {
        $this->transkripNilaiModel->deleteTranskrip($id);

        return redirect()->to('transkrip');
    }
}
