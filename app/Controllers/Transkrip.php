<?php

namespace App\Controllers;

use App\Models\TranskripModel;

class Transkrip extends BaseController
{
    protected $transkripNilaiModel;

    public function __construct()
    {
        $this->transkripNilaiModel = new TranskripModel();
    }

    public function index()
    {
        //if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Transkrip Nilai';
        return view("transkrip/index", $data);
    }

    public function delete($id)
    {
        if (empty($this->session->get('user_id'))) return redirect("login");

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
        if (empty($this->session->get('user_id'))) return redirect("login");

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
        if (empty($this->session->get('user_id'))) return redirect("login");

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
        if (empty($this->session->get('user_id'))) return redirect("login");

        $transkripModel = new TranskripModel();
        $transkrip = $transkripModel->getTranskripNilai($id);

        if (!$transkrip) {
            return redirect()->to('transkrip')->with('error', 'Transkrip not found');
        }

        $data['transkrip']['base'] = [];
        $data['transkrip']['semester1'] = [];
        $data['transkrip']['semester2'] = [];
        $data['transkrip']['semester3'] = [];
        $data['transkrip']['semester4'] = [];
        $data['transkrip']['semester5'] = [];
        $data['transkrip']['semester6'] = [];
        $data['transkrip']['semester7'] = [];
        $data['transkrip']['semester8'] = [];
        $data['transkrip']['total_sks'] = [
            'semester1' => 0,
            'semester2' => 0,
            'semester3' => 0,
            'semester4' => 0,
            'semester5' => 0,
            'semester6' => 0,
            'semester7' => 0,
            'semester8' => 0,
            'total' => 0,
            'total_nilai' => 0
        ];

        foreach ($transkrip as $i => $v) {
            if ($i === 0) {
                $data['transkrip']['base'] = $v;
            }
            $data['transkrip']['total_sks']['total'] += $v['sks'];
            $data['transkrip']['total_sks']['total_nilai'] += $v['nilai_angka'] * $v['sks'];

            if ($v['semester'] === 'semester I') {
                $data['transkrip']['total_sks']['semester1'] += $v['sks'];
                $data['transkrip']['semester1'][] = $v;
            } else if ($v['semester'] === 'semester II') {
                $data['transkrip']['total_sks']['semester2'] += $v['sks'];
                $data['transkrip']['semester2'][] = $v;
            } else if ($v['semester'] === 'semester III') {
                $data['transkrip']['total_sks']['semester3'] += $v['sks'];
                $data['transkrip']['semester3'][] = $v;
            } else if ($v['semester'] === 'semester IV') {
                $data['transkrip']['total_sks']['semester4'] += $v['sks'];
                $data['transkrip']['semester4'][] = $v;
            } else if ($v['semester'] === 'semester V') {
                $data['transkrip']['total_sks']['semester5'] += $v['sks'];
                $data['transkrip']['semester5'][] = $v;
            } else if ($v['semester'] === 'semester VI') {
                $data['transkrip']['total_sks']['semester6'] += $v['sks'];
                $data['transkrip']['semester6'][] = $v;
            } else if ($v['semester'] === 'semester VII') {
                $data['transkrip']['total_sks']['semester7'] += $v['sks'];
                $data['transkrip']['semester7'][] = $v;
            } else if ($v['semester'] === 'semester VIII') {
                $data['transkrip']['total_sks']['semester8'] += $v['sks'];
                $data['transkrip']['semester8'][] = $v;
            }
        }
        unset($transkrip);
        $data['pageTitle'] = 'View Transkrip';
        return view('transkrip/view_transkrip', $data);
    }

    public function list()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");

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
        if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $search = isset($params['search']) ? $params['search'] : '';

        $transkripModel = new TranskripModel();
        $data = $transkripModel->lookup($search);
        return json_encode($data);
    }
}
