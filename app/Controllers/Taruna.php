<?php

namespace App\Controllers;
use App\Models\TarunaModel;

class Taruna extends BaseController
{
    public function index()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Taruna';
        return view('taruna/index', $data);
    }

    public function create()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama' => 'required',
                'nomer_taruna' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|valid_date',
                'program_studi' => 'required',
                'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]'
            ]);

            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                // Proses unggah foto
                $foto = $this->request->getFile('foto');
                $foto->move(ROOTPATH . 'public/images');

                // Masukkan data taruna ke database
                $TarunaModel = new TarunaModel();
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'nomer_taruna' => $this->request->getPost('nomer_taruna'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'program_studi' => $this->request->getPost('program_studi'),
                    'foto' => $foto->getName()
                ];
                $TarunaModel->insert($data);

                return redirect('taruna');
            }
        }
        $data['pageTitle'] = 'taruna';
        return view('taruna/create', $data);
    }

    public function update($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $TarunaModel = new TarunaModel();
        $taruna = $TarunaModel->findById($id);
        $data['taruna'] = $taruna;
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama' => 'required',
                'nomer_taruna' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|valid_date',
                'program_studi' => 'required'
            ]);
            if ($this->request->getFile('foto')->getSize() > 0) {
                $validation->setRules(['foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]']);
            }
            $isDataValid = $validation->withRequest($this->request)->run();

            if($isDataValid){
                $data = [
                    'nama' => $this->request->getPost('nama'),
                    'nomer_taruna' => $this->request->getPost('nomer_taruna'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'program_studi' => $this->request->getPost('program_studi'),
                ];

                if ($this->request->getFile('foto')->getSize() > 0 && $this->request->getFile('foto')->isValid()) {
                    // Proses unggah foto
                    $foto = $this->request->getFile('foto');
                    if ($foto->move(ROOTPATH . 'public/images/')){
                        $data['foto'] = $foto->getName();

                        // Hapus foto lama jika ada
                        if (!empty($taruna['foto']) && file_exists(dirname(__FILE__).'/../../public/images/' . $taruna['foto'])) {
                            unlink(dirname(__FILE__).'/../../public/images/' . $taruna['foto']);
                        }
                    }
                }
                $TarunaModel->update($id, $data);
                return redirect('taruna');
            }
        }
        $data['pageTitle'] = 'taruna';
        return view('taruna/update', $data);
    }

    public function delete($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        if ($this->request->is('post') || $this->request->is('delete')) {
            $TarunaModel = new TarunaModel();
            $taruna = $TarunaModel->findById($id);
            if (isset($taruna['id']) && !empty($taruna['id'])) {
                if ($TarunaModel->deleteById($id)) {
                    if (!empty($taruna['foto']) && file_exists(dirname(__FILE__).'/../../public/images/' . $taruna['foto'])) {
                        unlink(dirname(__FILE__).'/../../public/images/' . $taruna['foto']);
                    }
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
        if (empty($this->session->get('user_id'))) return redirect("login");
        
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
        if (empty($this->session->get('user_id'))) return redirect("login");
        
        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['term'])?$params['term']['term']:'';
        
        $TarunaModel = new TarunaModel();
        $data = $TarunaModel->lookup($search);
        return json_encode(["results" => $data]);
    }
}
