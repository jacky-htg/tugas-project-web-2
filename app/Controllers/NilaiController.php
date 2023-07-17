<?php
namespace App\Controllers;

use App\Models\NilaiModel;

class NilaiController extends BaseController
{
    public function index()
    {

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = isset($params['draw'])? $params['draw']:1;
        $offset = isset($params['start'])? $params['start']:0;
        $limit = isset($params['length'])? $params['length']:10;
        $columnIndex = isset($params['order'])? $params['order'][0]['column']:null; // Column index
        $order = ($columnIndex || $columnIndex === '0')?$params['columns'][$columnIndex]['data']:null; // Column name
        $sort = $order?$params['order'][0]['dir']:null; // asc or desc
        $search = isset($params['search'])?$params['search']['value']:""; // Search value
        
        $NilaiModel = new NilaiModel();
        $count = $NilaiModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $NilaiModel->getData($search, $offset, $limit, $order, $sort)
        ];

        // Kirim respons dalam format JSON
        return $this->response->setJSON($data);
    }
}
