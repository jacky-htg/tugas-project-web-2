<?php

namespace App\Controllers;

use App\Models\IjazahModel;

class Ijazah extends BaseController
{
    public function index()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Ijazah';
        return view("ijazah/index", $data);
    }

    public function create()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $validation->setRules(['tanggal_ijazah' => 'required']);
            $validation->setRules(['tanggal_pengesahan' => 'required']);
            $validation->setRules(['gelar_akademik' => 'required']);
            $validation->setRules(['nomer_sk' => 'required']);
            $validation->setRules(['wakil_direktur' => 'required']);
            $validation->setRules(['direktur' => 'required']);
            $validation->setRules(['nomer_ijazah' => 'required']);
            $validation->setRules(['nomer_seri' => 'required']);
            $validation->setRules(['tanggal_yudisium' => 'required']);
            $validation->setRules(['judul_kkw' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $ijazahModel = new IjazahModel();
                $ijazahModel->insert([
                    "taruna" => $this->request->getPost('taruna'),
                    "program_studi" => $this->request->getPost('program_studi'),
                    "tanggal_ijazah" => $this->request->getPost('tanggal_ijazah'),
                    "tanggal_pengesahan" => $this->request->getPost('tanggal_pengesahan'),
                    "gelar_akademik" => $this->request->getPost('gelar_akademik'),
                    "nomer_sk" => $this->request->getPost('nomer_sk'),
                    "wakil_direktur" => $this->request->getPost('wakil_direktur'),
                    "direktur" => $this->request->getPost('direktur'),
                    "nomer_ijazah" => $this->request->getPost('nomer_ijazah'),
                    "nomer_seri" => $this->request->getPost('nomer_seri'),
                    "tanggal_yudisium" => $this->request->getPost('tanggal_yudisium'),
                    "judul_kkw" => $this->request->getPost('judul_kkw')
                ]);

                return redirect('ijazah');
            }
        }
        $data['pageTitle'] = 'Ijazah';
        return view('ijazah/create', $data);
    }

public function view($id)
{
    if (empty($this->session->get('user_id'))) return redirect("login");

    $ijazahModel = new IjazahModel();
    $data['ijazah'] = $ijazahModel->findById($id); 
    $data['pageTitle'] = 'Ijazah';
        return view('ijazah/view', $data);
}

    public function update($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");

        $ijazahModel = new IjazahModel();
        $data['ijazah'] = $ijazahModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $validation->setRules(['tanggal_ijazah' => 'required']);
            $validation->setRules(['tanggal_pengesahan' => 'required']);
            $validation->setRules(['gelar_akademik' => 'required']);
            $validation->setRules(['nomer_sk' => 'required']);
            $validation->setRules(['wakil_direktur' => 'required']);
            $validation->setRules(['direktur' => 'required']);
            $validation->setRules(['nomer_ijazah' => 'required']);
            $validation->setRules(['nomer_seri' => 'required']);
            $validation->setRules(['tanggal_yudisium' => 'required']);
            $validation->setRules(['judul_kkw' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();
            
            if ($isDataValid) {
                $ijazahModel->updateById($id, [
                    "taruna" => $this->request->getPost('taruna'),
                    "program_studi" => $this->request->getPost('program_studi'),
                    "tanggal_ijazah" => $this->request->getPost('tanggal_ijazah'),
                    "tanggal_pengesahan" => $this->request->getPost('tanggal_pengesahan'),
                    "gelar_akademik" => $this->request->getPost('gelar_akademik'),
                    "nomer_sk" => $this->request->getPost('nomer_sk'),
                    "wakil_direktur" => $this->request->getPost('wakil_direktur'),
                    "direktur" => $this->request->getPost('direktur'),
                    "nomer_ijazah" => $this->request->getPost('nomer_ijazah'),
                    "nomer_seri" => $this->request->getPost('nomer_seri'),
                    "tanggal_yudisium" => $this->request->getPost('tanggal_yudisium'),
                    "judul_kkw" => $this->request->getPost('judul_kkw')
                ]);

                return redirect('ijazah');
            }
        }
        $data['pageTitle'] = 'Ijazah';
        return view('ijazah/update', $data);
    }

    public function delete($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post') || $this->request->is('delete')) {
            $ijazahModel = new IjazahModel();
            $ijazah = $ijazahModel->findById($id);
            if (isset($ijazah['id']) && !empty($ijazah['id'])) {
                if ($ijazahModel->deleteById($id)) {
                    return json_encode(["message" => "Penghapusan data ijazah berhasil"]);
                } else {
                    return json_encode(["message" => "Penghapusan data ijazah gagal"]);
                }
            } else {
                return json_encode(["message" => "Invalid ID"]);
            }
        }
        return json_encode(["message" => "Invalid Method"]);
    }

    public function list()
    {
        // Jika user belum login redirect ke halaman login
        if (empty($this->session->get('user_id'))) return redirect("login");


        // Nilai Default Variable
        $draw = 1;
        $offset = 0;
        $limit = 10;
        $order = 'ijazah.id';
        $sort = 'desc';
        $search = null;


        // Deklarasikan variable draw    
        if (!empty($this->request->getVar('draw'))) {
            
            if ($this->request->getVar('draw', FILTER_SANITIZE_NUMBER_INT)) {
                // Jika request draw tidak kosong, ambil dari dari request
                $draw = $this->request->getVar('draw', FILTER_SANITIZE_NUMBER_INT);
            } else {
                // Data array jika limit bukan angka
                $pesanError = [
                    // perlu standar kode error untuk setiap req
                    "status" => "failed",
                    // Ambil data bedasarkan filtering dari request
                    "pesan" => "Draw Harus Berupa Angka"
                ];
                // kirim error json ke frontend
                return json_encode($pesanError);
            }
        }

        // Deklarasikan variabel offset
        if (!empty($this->request->getVar('start'))) {
            if ($this->request->getVar('start', FILTER_SANITIZE_NUMBER_INT)) {
                // Jika request start tidak kosong, ambil dari dari request
                $offset = $this->request->getVar('start', FILTER_SANITIZE_NUMBER_INT);
            } else {
                // Data array jika limit bukan angka
                $pesanError = [
                    // perlu standar kode error untuk setiap req
                    "status" => "failed",
                    // Ambil data bedasarkan filtering dari request
                    "pesan" => "Starting (offset) Data Harus Berupa Angka"
                ];
                // kirim error json ke frontend
                return json_encode($pesanError);
            }
        }

        // Deklarasikan variable limit data yang ditampilkan

        if (!empty($this->request->getVar('length'))) {
            // Sanitize url request
            if ($this->request->getVar('length', FILTER_SANITIZE_NUMBER_INT)) {
                // Jika request length tidak kosong, ambil dari request
                $limit = $this->request->getVar('length', FILTER_SANITIZE_NUMBER_INT);
            } else {
                // Data array
                $pesanError = [
                    // perlu standar kode error untuk setiap req
                    "status" => "failed",
                    // Ambil data bedasarkan filtering dari request
                    "pesan" => "Limit Data Harus Berupa Angka"
                ];
                // kirim error json ke frontend
                return json_encode($pesanError);
            }
        }

        // Deklarasikan variable sort
        if (!empty($this->request->getVar('sort'))) {
            if ($this->request->getVar('sort', FILTER_UNSAFE_RAW)) {
                // Jika request sort tidak kosong, ambil dari request
                $sort = $this->request->getVar('sort', FILTER_UNSAFE_RAW);
            }
        }

        // Deklarasikan variable cari
        if (!empty($this->request->getVar('cari'))) {
            if ($this->request->getVar('cari', FILTER_UNSAFE_RAW)) {
                // Jika request cari tidak kosong, ambil dari request
                $search = $this->request->getVar('cari', FILTER_UNSAFE_RAW);
            }
        }

        // Deklarasikan variable order
        if (!empty($this->request->getVar('order'))) {
            if ($this->request->getVar('order', FILTER_UNSAFE_RAW)) {
                // Jika request cari tidak kosong, ambil dari request
                $order = $this->request->getVar('order', FILTER_UNSAFE_RAW);
            }
        }

        // Deklarasikan model ijazah
        $ijazahModel = new IjazahModel();

        // Hitung data hasil pencarian
        $count = $ijazahModel->count($search);

        // Display Data
        if ((int) $limit >= (int) $count) {
            $disp = $count;
        } else {
            $disp = $limit;
        }

        // Data array
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $disp,
            // Ambil data bedasarkan filtering dari request
            "data" => $ijazahModel->list($search, $offset, $limit, $order, $sort)
        ];

        // Ubah data array dari CI4 kedalam bentuk Java Script Object Notation (JSON)
        // Untuk dikonsumsi oleh frontEnd
        return json_encode($data);
    }

    public function lookup()
    {
        // Jika user belum login redirect ke halaman login
        if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['term'])?$params['term']['term']:'';

        $ijazahModel = new IjazahModel();
        $data = $ijazahModel->lookup($search);

        // Ubah data array dari CI4 kedalam bentuk Java Script Object Notation (JSON)
        // Untuk dikonsumsi oleh frontEnd
        return json_encode(["results" => $data]);
    }
}