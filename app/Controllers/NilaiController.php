<?php

namespace App\Controllers;

use App\Models\NilaiModel;

class NilaiController extends BaseController
{
    public function index()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Nilai';
        return view('nilai/index', $data);
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['matakuliah' => 'required']);
            $validation->setRules(['nilai_angka' => 'required']);
            $validation->setRules(['nilai_huruf' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $nilaiModel = new NilaiModel();
                $nilaiModel->insert([
                    "taruna" => $this->request->getPost('taruna'),
                    "matakuliah" => $this->request->getPost('matakuliah'),
                    "nilai_angka" => $this->request->getPost('nilai_angka'),
                    "nilai_huruf" => $this->request->getPost('nilai_huruf')
                ]);

                return redirect('nilai');
            }
        }
        $data['pageTitle'] = 'Nilai';
        return view('nilai/create', $data);
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $nilaiModel = new NilaiModel();
        $data['nilai'] = $nilaiModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['matakuliah' => 'required']);
            $validation->setRules(['nilai_angka' => 'required']);
            $validation->setRules(['nilai_huruf' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $nilaiModel->updateById($id, [
                    "taruna" => $this->request->getPost('taruna'),
                    "matakuliah" => $this->request->getPost('matakuliah'),
                    "nilai_angka" => $this->request->getPost('nilai_angka'),
                    "nilai_huruf" => $this->request->getPost('nilai_huruf')
                ]);

                return redirect('nilai');
            }
        }
        $data['pageTitle'] = 'Nilai';
        return view('nilai/update', $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post') || $this->request->is('delete')) {
            $nilaiModel = new NilaiModel();
            $nilai = $nilaiModel->findById($id);
            if (isset($nilai['id']) && !empty($nilai['id'])) {
                $nilaiModel->deleteById($id);
            }
        }
    }

    public function list()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = isset($params['draw']) ? $params['draw'] : 1;
        $offset = isset($params['start']) ? $params['start'] : 0;
        $limit = isset($params['length']) ? $params['length'] : 10;
        $columnIndex = isset($params['order']) ? $params['order'][0]['column'] : null; // Column index
        $order = ($columnIndex || $columnIndex === '0') ? $params['columns'][$columnIndex]['data'] : null; // Column name
        $sort = $order ? $params['order'][0]['dir'] : null; // asc or desc
        $search = isset($params['search']) ? $params['search']['value'] : ""; // Search value

        $NilaiModel = new NilaiModel();
        $count = $NilaiModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $NilaiModel->getData($search, $offset, $limit, $order, $sort)
        ];

        // Kirim respons dalam format JSON
        return $this->response->setJSON($data);
    }
}
