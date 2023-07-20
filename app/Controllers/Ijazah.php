<?php

namespace App\Controllers;

use App\Models\IjazahModel;

class Ijazah extends BaseController
{
    public function index()
    {
        echo "Halaman Ijazah";
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

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

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

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
        // if (empty($this->session->get('user_id'))) return redirect("login");

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
        // Jika fungsi login pada aplikasi ini sudah berjalan uncomment kode di bawah
        // if (empty($this->session->get('user_id'))) return redirect("login");

        // Sanitize request input saat mengakses URL
        $vars = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Nilai Deafult Variable
        $defDraw = 1;
        $defStart = 0;
        $defLength = 10;
        $defOrder = 'id';
        $defSort = 'desc';
        $defSearch = null;

        // Deklarasikan variable draw    
        if (!empty($this->request->getVar('draw'))) {
            // Jika request draw tidak kosong, ambil dari dari request
            $draw = $this->request->getVar('draw');
        } else {
            // Jika kosong maka draw = 1
            $draw = $defDraw;
        }

        // Deklarasikan variabel offset
        if (!empty($this->request->getVar('start'))) {
            // Jika request start tidak kosong, ambil dari request
            $offset = $this->request->getVar('start');
        } else {
            // Jika kosong maka offset = 0
            $offset = $defStart;
        }

        // Deklarasikan variable limit data yang ditampilkan
        if (!empty($this->request->getVar('length'))) {
            // Jika request length tidak kosong, ambil dari request
            $limit = $this->request->getVar('length');
        } else {
            // Jika kosong maka limit data = 10
            $limit = $defLength;
        }

        $columnIndex = isset($vars['order']) ? $vars['order'][0]['column'] : null; // Column index
        $order = ($columnIndex || $columnIndex === '0') ? $vars['columns'][$columnIndex]['data'] : null; // Column name

        // Deklarasikan variable sort
        if (!empty($this->request->getVar('sort'))) {
            // Jika request sort tidak kosong, ambil dari request
            $sort = $this->request->getVar('sort');
        } else {
            // Jika kosong maka sort = desc
            $sort = $defSort;
        }

        // Deklarasikan variable cari
        if (!empty($this->request->getVar('cari'))) {
            // Jika request cari tidak kosong, ambil dari request
            $search = $this->request->getVar('cari');
        } else {
            // Jika kosong maka cari = null
            $search = $defSearch;
        }

        // Deklarasikan variable order
        if (!empty($this->request->getVar('order'))) {
            // Jika request cari tidak kosong, ambil dari request
            $order = $this->request->getVar('order');
        } else {
            // Jika kosong maka cari = null
            $order = $defOrder;
        }

        // Deklarasikan model ijazah
        $ijazahModel = new IjazahModel();

        // Hitung data hasil pencarian
        if (!empty($this->request->getVar('cari'))) {
            $count = $ijazahModel->countAllResults($search);
        } else {
            $count = $ijazahModel->countAllResults();
        }

        // Data array
        $data = [
            "draw" => intval($draw),
            "totalData" => $count,
            "totalTampilanData" => $count,
            // Ambil data bedasarkan filtering dari request
            "data" => $ijazahModel->list($search, $offset, $limit, $order, $sort)
        ];

        // Ubah data array dari CI4 kedalam bentuk Java Script Object Notation (JSON)
        // Untuk dikonsumsi oleh frontEnd
        return json_encode($data);
    }

    public function lookup()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['search'])?$params['search']:'';
        
        $ijazahModel = new IjazahModel();
        $data = $ijazahModel->lookup($search);
        return json_encode($data);
    }
}