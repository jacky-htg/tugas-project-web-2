<?php

namespace App\Controllers;
use App\Models\ProgramStudiModel;

class ProgramStudi extends BaseController
{
    public function index()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        return view('programstudi/index');
    }

    public function create()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['nama' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $programStudiModel = new ProgramStudiModel();
                $programStudiModel->insert([
                    "nama" => $this->request->getPost('nama'),
                    "program_pendidikan" => $this->request->getPost('program_pendidikan'),
                    "akreditasi" => $this->request->getPost('akreditasi'),
                    "sk_akreditasi" => $this->request->getPost('sk_akreditasi')
                ]);
            
                return redirect('programstudi');
            }
        }
        return view('programstudi/create');
    }

    public function update($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $programStudiModel = new ProgramStudiModel();
        $data['programStudi'] = $programStudiModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['nama' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $programStudiModel->updateById($id, [
                    "nama" => $this->request->getPost('nama'),
                    "program_pendidikan" => $this->request->getPost('program_pendidikan'),
                    "akreditasi" => $this->request->getPost('akreditasi'),
                    "sk_akreditasi" => $this->request->getPost('sk_akreditasi')
                ]);
                
                return redirect('programstudi');
            }
        }
        return view('programstudi/update', $data);
    }

    public function delete($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $programStudiModel = new ProgramStudiModel();
            $programStudi = $programStudiModel->findById($id);
            if (isset($programStudi['id']) && !empty($programStudi['id'])) {
                $programStudiModel->deleteById($id);
            }
        }
    }

    public function list()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = $params['draw'];
        $offset = $params['start'];
        $limit = $params['length']; // Rows display per page
        $columnIndex = isset($params['order'])? $params['order'][0]['column']:null; // Column index
        $order = ($columnIndex || $columnIndex === '0')?$params['columns'][$columnIndex]['data']:null; // Column name
        $sort = $order?$params['order'][0]['dir']:null; // asc or desc
        $search = $params['search']['value']; // Search value
        
        $programStudiModel = new ProgramStudiModel();
        $count = $programStudiModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $programStudiModel->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function listIdNama()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['term'])?$params['term']['term']:'';
        
        $programStudiModel = new ProgramStudiModel();
        $data = $programStudiModel->listIdNama($search);
        return json_encode(["results" => $data]);
    }
}