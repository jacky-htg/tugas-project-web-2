<?php

namespace App\Controllers;
use App\Models\TranskripModel;

class Transkrip extends BaseController
{
    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['ijazah' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $transkripModel = new TranskripModel();
                $transkripModel->insert([
                    "taruna" => $this->request->getPost('taruna'),
                    "ijazah" => $this->request->getPost('ijazah'),
                    "program_studi" => $this->request->getPost('program_studi')
                ]);
            
                return redirect('transkrip');
            }
        }
        return view('transkrip/create');
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        
        $transkripModel = new TranskripModel();
        $data['transkrip'] = $transkripModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['ijazah' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $transkripModel->updateById($id, [
                "taruna" => $this->request->getPost('taruna'),
                "ijazah" => $this->request->getPost('ijazah'),
                "program_studi" => $this->request->getPost('program_studi')
                ]);
                
                return redirect('/');
            }
        }
        return view('transkrip/update', $data);
    }

}