<?php

namespace App\Models;

use CodeIgniter\Model;

class TranskripNilaiModel extends Model
{
    protected $table = 'transkrip_nilai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['taruna_id', 'nilai'];

    public function deleteTranskrip($id)
    {
        $this->delete($id);
    }
}
