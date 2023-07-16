<?php

namespace app\Controllers;

use app\Models\TranskripNilaiModel;

class TranskripNilaiController extends BaseController
{
    public function index()
    {
        $model = new TranskripNilaiModel();
        $data['transkrip_nilai'] = $model->findAll();

        return view('list_transkrip_nilai', $data);
    }

    public function delete($id)
    {
        $model = new TranskripNilaiModel();
        $model->delete($id);

        return redirect()->to('/transkrip');
    }
}
