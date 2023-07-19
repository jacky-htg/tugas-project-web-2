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
}
