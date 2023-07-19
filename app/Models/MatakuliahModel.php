<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class MatakuliahModel extends Model
{
  protected $table = 'matakuliah';
  protected $primaryId = 'id';
  protected $allowedFields = ['kode', 'matakuliah', 'sks', 'nilai_angka', 'nilai_huruf', 'semester'];

  public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id as DT_RowId, kode, matakuliah');
    if ($search) {
      $query = $query->like('kode', $search)->orLike('matakuliah', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function lookup($search)
  {
    $query = $this->select('id, matakuliah');

    if ($search) {
      $query = $query->like('matakuliah', $search);
    }
    $query = $query->orderBy("matakuliah", "ASC");

    return $query->findAll();
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('kode', $search)->orLike('matakuliah', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  /*public function findByNama($nama)
  {
    return $this->select('id, nama, program_pendidikan, akreditasi, sk_akreditasi')
                ->where('nama', $nama)
                ->first();
  }
  */
  public function findById($id)
  {
    return $this->select('id, kode, matakuliah, sks, nilai_angka, nilai_huruf,semester')
      ->where('id', $id)
      ->first();
  }

  public function updateById($id, $data)
  {
    return $this->where('id', $id)->update(null, $data);
  }

  /*public function deleteById($id)
  {
    return $this->where('id', $id)->delete();
  }*/
}
