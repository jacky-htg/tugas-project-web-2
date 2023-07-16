<?php

namespace app\Models;

use CodeIgniter\Model;

class TranskripNilaiModel extends Model
{
    protected $table = 'transkrip_nilai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_taruna'];
}
