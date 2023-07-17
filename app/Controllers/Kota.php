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
}
