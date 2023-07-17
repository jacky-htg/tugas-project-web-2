<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\TranskripNilaiModel;

class TranskripNilaiAPI extends BaseController
{
    protected $transkripNilaiModel;

    public function __construct()
    {
        $this->transkripNilaiModel = new TranskripNilaiModel();
    }

    public function index()
    {
        $page = $this->request->getVar('page') ?? 1;
        $perPage = $this->request->getVar('per_page') ?? 10;
        $sortBy = $this->request->getVar('sort_by') ?? 'id';
        $sortOrder = $this->request->getVar('sort_order') ?? 'asc';
        $filter = $this->request->getVar('filter') ?? '';

        // Filter data berdasarkan keyword
        if (!empty($filter)) {
            $this->transkripNilaiModel->like('field1', $filter);
            $this->transkripNilaiModel->orLike('field2', $filter);
            // Tambahkan field lain yang ingin difilter
        }

        // Menghitung total data untuk pagination
        $totalRows = $this->transkripNilaiModel->countAllResults();

        // Mengatur pagination
        $pager = \Config\Services::pager();
        $transkripNilai = $this->transkripNilaiModel->orderBy($sortBy, $sortOrder)->paginate($perPage, 'transkrip_nilai');
        $pagination = $this->transkripNilaiModel->pager;

        // Format data response
        $responseData = [
            'status' => 'sukses',
            'message' => 'Data Transkrip Nilai berhasil diambil',
            'data' => $transkripNilai,
            'pagination' => $pagination,
            'total_rows' => $totalRows
        ];

        return $this->response->setJSON($responseData);
    }
}
