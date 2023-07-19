<?php

namespace App\Controllers;
use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
    public function index()
    {
        echo "Halaman Matakuliah"; 
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['kode' => 'required']);
            $validation->setRules(['matakuliah' => 'required']);
            $validation->setRules(['sks' => 'required']);
            $validation->setRules(['nilai_angka' => 'required']);
            $validation->setRules(['nilai_huruf' => 'required']);
            $validation->setRules(['semester' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $matakuliahModel = new MatakuliahModel();
                $matakuliahModel->insert([
                    "kode" => $this->request->getPost('kode'),
                    "matakuliah" => $this->request->getPost('matakuliah'),
                    "sks" => $this->request->getPost('sks'),                   
                    "nilai_angka" => $this->request->getPost('nilai_angka'),
                    "nilai_huruf" => $this->request->getPost('nilai_huruf'),
                    "semester" => $this->request->getPost('semester'),
                ]);
            
                return redirect('matakuliah');
            }
        }
        $data['pageTitle'] = 'Mata Kuliah';
        return view('matakuliah/create', $data);
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $matakuliahModel = new MatakuliahModel();
        $data['matakuliah'] = $matakuliahModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['kode' => 'required']);
            $validation->setRules(['matakuliah' => 'required']);
            $validation->setRules(['sks' => 'required']);
            $validation->setRules(['nilai_angka' => 'required']);
            $validation->setRules(['nilai_huruf' => 'required']);
            $validation->setRules(['semester' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $matakuliahModel->updateById($id, [
                    "kode" => $this->request->getPost('kode'),
                    "matakuliah" => $this->request->getPost('matakuliah'),
                    "sks" => $this->request->getPost('sks'),
                    "nilai_angka" => $this->request->getPost('nilai_angka'),
                    "nilai_huruf" => $this->request->getPost('nilai_huruf'),
                    "semester" => $this->request->getPost('semester'),
                ]);
                
                return redirect('matakuliah');
            }
        }
        $data['pageTitle'] = 'Mata Kuliah';
        return view('matakuliah/update', $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $matakuliahModel = new MatakuliahModel();
            $matakuliah = $matakuliahModel->findById($id);
            if (isset($matakuliah['id']) && !empty($matakuliah['id'])) {
                if ($matakuliahModel->deleteById($id)) {
                    return json_encode(["message" => "pengahapusan data mata kuliah berhasil"]);
                } else {
                    return json_encode(["message" => "pengahapusan data mata kuliah  gagal"]);
                }
            } else {
                return json_encode(["message" => "Invalid ID"]);
            }
        }
        return json_encode(["message" => "Invalid Method"]);
    }
    /*
        public function list()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = isset($params['draw'])?$params['draw']:1;
        $offset = isset($params['start'])?$params['start']:0;
        $limit = isset($params['length'])?$params['length']:10; // Rows display per page
        $columnIndex = isset($params['order'])? $params['order'][0]['column']:null; // Column index
        $order = ($columnIndex || $columnIndex === '0')?$params['columns'][$columnIndex]['data']:null; // Column name
        $sort = $order?$params['order'][0]['dir']:null; // asc or desc
        $search = isset($params['search'])?$params['search']['value']:''; // Search value
        
        $kotaModel = new KotaModel();
        $count = $kotaModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $kotaModel->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function lookup()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['search'])?$params['search']:'';
        
        $kotaModel = new KotaModel();
        $data = $kotaModel->lookup($search);
        return json_encode($data);
    }*/
}
