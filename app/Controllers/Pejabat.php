<?php

namespace App\Controllers;
use App\Models\ModelPejabat;

class Pejabat extends BaseController
{
    public function index()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Pejabat';
        return view("pejabat/index", $data);
    }

    public function create()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['nama' => 'required']);
            $validation->setRules(['nip' => 'required']);
            $validation->setRules(['golongan' => 'required']);
            $validation->setRules(['jabatan' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $modelPejabat = new ModelPejabat();
                $modelPejabat->insert([
                    "nama" => $this->request->getPost('nama'),
                    "nip" => $this->request->getPost('nip'),
                    "golongan" => $this->request->getPost('golongan'),
                    "jabatan" => $this->request->getPost('jabatan')
                ]);
            
                return redirect('pejabat');
            }
        }
        $data['pageTitle'] = 'Pejabat';
        return view('pejabat/create', $data);
    }

    public function update($id)
    {
       if (empty($this->session->get('user_id'))) return redirect("login");
        
        $modelPejabat = new ModelPejabat();
        $data['pejabat'] = $modelPejabat->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['nama' => 'required']);
            $validation->setRules(['nip' => 'required']);
            $validation->setRules(['golongan' => 'required']);
            $validation->setRules(['jabatan' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();
            
            if($isDataValid){
                $modelPejabat->updateById($id, [
                    "nama" => $this->request->getPost('nama'),
                    "nip" => $this->request->getPost('nip'),
                    "golongan" => $this->request->getPost('golongan'),
                    "jabatan" => $this->request->getPost('jabatan')
                ]);
                
                return redirect('pejabat');
            }
        }
        $data['pageTitle'] = 'Pejabat';
        return view('pejabat/update', $data);
    }

    public function delete($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $modelPejabat = new ModelPejabat();
            $pejabat = $modelPejabat->findById($id);
            if (isset($pejabat['id']) && !empty($pejabat['id'])) {
                if ($modelPejabat->deleteById($id)) {
                    return json_encode(["message" => "pengahapusan data pejabat berhasil"]);
                } else {
                    return json_encode(["message" => "pengahapusan data pejabat gagal"]);
                }
            } else {
                return json_encode(["message" => "Invalid ID"]);
            }
        }
        return json_encode(["message" => "Invalid Method"]);
    }

    public function list()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = isset($params['draw'])?$params['draw']:1;
        $offset = isset($params['start'])?$params['start']:0;
        $limit = isset($params['length'])?$params['length']:10; // Rows display per page
        $columnIndex = isset($params['order'])? $params['order'][0]['column']:null; // Column index
        $order = ($columnIndex || $columnIndex === '0')?$params['columns'][$columnIndex]['data']:null; // Column name
        $sort = $order?$params['order'][0]['dir']:null; // asc or desc
        $search = isset($params['search'])?$params['search']['value']:''; // Search value
        
        $modelPejabat = new ModelPejabat();
        $count = $modelPejabat->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $modelPejabat->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function lookup()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['term'])?$params['term']['term']:'';
        
        $modelPejabat = new ModelPejabat();
        $data = $modelPejabat->lookup($search);
        //return json_encode($data);
        return json_encode(["results" => $data]);
    }
}