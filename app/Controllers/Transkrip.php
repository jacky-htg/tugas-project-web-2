<?php

namespace App\Controllers;

use App\Models\TranskripModel;
use App\Models\MatakuliahModel;

class Transkrip extends BaseController
{
    protected $transkripNilaiModel;
    protected $matakuliahModel;

    public function __construct()
    {
        $this->transkripNilaiModel = new TranskripModel();
        $this->matakuliahModel = new MatakuliahModel();
    }

    public function index()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Transkrip Nilai';
        return view("transkrip/index", $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post') || $this->request->is('delete')) {
            $transkrip = $this->transkripNilaiModel->findById($id);
            if (isset($transkrip['id']) && !empty($transkrip['id'])) {
                if ($this->transkripNilaiModel->deleteTranskrip($id)) {
                    return json_encode(["message" => "pengahapusan data transkrip berhasil"]);
                } else {
                    return json_encode(["message" => "pengahapusan data transkrip gagal"]);
                }
            } else {
                return json_encode(["message" => "Invalid ID"]);
            }
        }
        return json_encode(["message" => "Invalid Method"]);
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['taruna' => 'required']);
            $validation->setRules(['ijazah' => 'required']);
            $validation->setRules(['program_studi' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $transkripModel = new TranskripModel();
                $transkripModel->insert([
                    "taruna" => $this->request->getPost('taruna'),
                    "ijazah" => $this->request->getPost('ijazah'),
                    "program_studi" => $this->request->getPost('program_studi')
                ]);

                return redirect('transkrip');
            }
        }
        $data['pageTitle'] = 'Transkrip Nilai';
        return view('transkrip/create', $data);
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

            if ($isDataValid) {
                $transkripModel->updateById($id, [
                    "taruna" => $this->request->getPost('taruna'),
                    "ijazah" => $this->request->getPost('ijazah'),
                    "program_studi" => $this->request->getPost('program_studi')
                ]);

                return redirect('transkrip');
            }
        }
        $data['pageTitle'] = 'Transkrip Nilai';
        return view('transkrip/update', $data);
    }

    public function view_transkrip($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        $transkripModel = new TranskripModel();
        $data['transkrip'] = $transkripModel->getTranskripNilai($id);
        $data['lampiran_ijazah'] = $transkripModel->getTranskripNilai($id);
        $data['nama'] = $transkripModel->getTranskripNilai($id);
        $data['nomor_taruna'] = $transkripModel->getTranskripNilai($id);
        $data['tempat_tanggal_lahir'] = $transkripModel->getTranskripNilai($id);
        $data['pendidikan'] = $transkripModel->getTranskripNilai($id);
        $data['program_studi'] = $transkripModel->getTranskripNilai($id);
        $data['status'] = $transkripModel->getTranskripNilai($id);
        $data['tanggal_yudisium'] = $transkripModel->getTranskripNilai($id);
        $data['semester'] = $transkripModel->getTranskripNilai($id);
        $data['nama_matakuliah'] = $transkripModel->getTranskripNilai($id);
        $data['sks'] = $transkripModel->getTranskripNilai($id);
        $data['nilai_huruf'] = $transkripModel->getTranskripNilai($id);
        $data['kode'] = $transkripModel->getTranskripNilai($id);

        $data['matakuliah'] = $this->matakuliahModel->getAllMatakuliah($id);

        $data['pageTitle'] = 'View Transkrip';
        return view('transkrip/view_transkrip', $data);

        if (!$data['transkrip']) {
            return redirect()->to('transkrip')->with('error', 'Transkrip not found');
        }
    }

    public function list()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = isset($params['draw']) ? $params['draw'] : 1;
        $offset = isset($params['start']) ? $params['start'] : 0;
        $limit = isset($params['length']) ? $params['length'] : 10; // Rows display per page
        $columnIndex = isset($params['order']) ? $params['order'][0]['column'] : null; // Column index
        $order = ($columnIndex || $columnIndex === '0') ? $params['columns'][$columnIndex]['data'] : null; // Column name
        $sort = $order ? $params['order'][0]['dir'] : null; // asc or desc
        $search = isset($params['search']) ? $params['search']['value'] : ''; // Search value

        $transkripModel = new TranskripModel();
        $count = $transkripModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $transkripModel->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function lookup()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['search']) ? $params['search'] : '';

        $transkripModel = new TranskripModel();
        $data = $transkripModel->lookup($search);
        return json_encode($data);
    }
}
