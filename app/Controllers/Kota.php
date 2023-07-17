<?php

namespace App\Controllers;
use App\Models\KotaModel;

class Kota extends BaseController
{
    public function index()
    {
        echo "Halaman Kota";
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['kode_kota' => 'required']);
            $validation->setRules(['nama' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $kotaModel = new KotaModel();
                $kotaModel->insert([
                    "kode_kota" => $this->request->getPost('kode_kota'),
                    "nama" => $this->request->getPost('nama')
                ]);
            
                return redirect('kota');
            }
        }
        return view('kota/create');
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $kotaModel = new KotaModel();
        $data['kota'] = $kotaModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['kode_kota' => 'required']);
            $validation->setRules(['nama' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $kotaModel->updateById($id, [
                    "kode_kota" => $this->request->getPost('kode_kota'),
                    "nama" => $this->request->getPost('nama')
                ]);
                
                return redirect('kota');
            }
        }
        return view('kota/update', $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $kotaModel = new KotaModel();
            $kota = $kotaModel->findById($id);
            if (isset($kota['id']) && !empty($kota['id'])) {
                if ($kotaModel->deleteById($id)) {
                    return json_encode(["message" => "pengahapusan data kota berhasil"]);
                } else {
                    return json_encode(["message" => "pengahapusan data kota gagal"]);
                }
            } else {
                return json_encode(["message" => "Invalid ID"]);
            }
        }
        return json_encode(["message" => "Invalid Method"]);
    }

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
    }
}
