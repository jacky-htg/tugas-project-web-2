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
        // Mengambil data dari API
        $client = \Config\Services::curlrequest();
        $response = $client->get('http://localhost:8080/api/transkripnilai');
        $transkripNilai = json_decode($response->getBody(), true);

        // Mengirim data ke view
        $data['transkrip_nilai'] = $transkripNilai['data'];

        return view('list_transkrip_nilai', $data);
    }

    public function delete($id)
    {
        // Menghapus data melalui API
        $client = \Config\Services::curlrequest();
        $response = $client->delete('http://localhost:8080/api/transkripnilai/' . $id);

        return redirect()->to('transkrip');
    }
}
