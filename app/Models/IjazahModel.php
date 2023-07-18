<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class IjazahModel extends Model
{
  protected $table = 'ijazah';
  protected $primaryId = 'id';
  protected $allowedFields = ['taruna', 'program_studi', 'tanggal_ijazah', 'tanggal_pengesahan', 'gelar_akademik', 'nomer_sk', 'wakil_direktur', 'direktur', 'nomer_ijazah', 'nomer_seri', 'tanggal_yudisium', 'judul_kkw',];

  /*public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id as DT_RowId, nama, program_pendidikan, akreditasi, sk_akreditasi');
    if ($search) {
      $query = $query->like('nama', $search)->orLike('program_pendidikan', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function listIdNama($search)
  {
    $query = $this->select('id, nama');

    if ($search) {
      $query = $query->like('nama', $search);
    }
    $query = $query->orderBy("nama", "ASC");

    return $query->findAll();
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('nama', $search)->orLike('program_pendidikan', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findByNama($nama)
  {
    return $this->select('id, nama, program_pendidikan, akreditasi, sk_akreditasi')
      ->where('nama', $nama)
      ->first();
  }*/

  public function findById($id)
  {
    return $this->select('id, taruna, program_studi , tanggal_ijazah, tanggal_pengesahan, gelar_akademik, nomer_sk, wakil_direktur , direktur , nomer_ijazah, nomer_seri, tanggal_yudisium, judul_kkw')
      ->where('id', $id)
      ->first();
  }

  public function updateById($id, $data)
  {
    return $this->where('id', $id)->update(null, $data);
  }

  public function deleteById($id)
  {
    return $this->where('id', $id)->delete();
  }
}
