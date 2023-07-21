<?php

namespace App\Controllers;
use App\Models\TarunaModel;

class Taruna extends BaseController
{
    public function index()
    {
        echo "halaman taruna";
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['id' => 'required']);
            $validation->setRules(['nama' => 'required']);
            $validation->setRules(['nomer_taruna' => 'required']);
            $validation->setRules(['tempat_lahir' => 'required']);
            $validation->setRules(['tanggal_lahir' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $validation->setRules(['foto' => 'required']);
            
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $TarunaModel = new TarunaModel();
                $TarunaModel->insert([
                    "id" => $this->request->getPost('id'),
                    "nama" => $this->request->getPost('nama'),
                    "nomer_taruna" => $this->request->getPost('nomer_taruna'),
                    "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                    "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                    "program_studi" => $this->request->getPost('program_studi'),
                    "foto" => $this->request->getPost('foto')
                ]);
            
                return redirect('taruna');
            }
        }
        $data['pageTitle'] = 'taruna';
        return view('taruna/create', $data);
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $TarunaModel = new TarunaModel();
        $data['taruna'] = $TarunaModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['id' => 'required']);
            $validation->setRules(['nama' => 'required']);
            $validation->setRules(['nomer_taruna' => 'required']);
            $validation->setRules(['tempat_lahir' => 'required']);
            $validation->setRules(['tanggal_lahir' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $validation->setRules(['foto' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $TarunaModel->updateById($id, [
                    "id" => $this->request->getPost('id'),
                    "nama" => $this->request->getPost('nama'),
                    "nomer_taruna" => $this->request->getPost('nomer_taruna'),
                    "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                    "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                    "program_studi" => $this->request->getPost('program_studi'),
                    "foto" => $this->request->getPost('foto')
                ]);
                
                return redirect('taruna');
            }
        }
        $data['pageTitle'] = 'taruna';
        return view('taruna/update', $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $TarunaModel = new TarunaModel();
            $Taruna = $TarunaModel->findById($id);
            if (isset($taruna['id']) && !empty($taruna['id'])) {
                if ($tarunaModel->deleteById($id)) {
                    return json_encode(["message" => "pengahapusan data taruna berhasil"]);
                } else {
                    return json_encode(["message" => "pengahapusan data taruna gagal"]);
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
        
        $TarunaModel = new TarunaModel();
        $count = $TarunaModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $TarunaModel->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function lookup()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['search'])?$params['search']:'';
        
        $TarunaModel = new TarunaModel();
        $data = $TarunaModel->lookup($search);
        return json_encode($data);
    }
}
