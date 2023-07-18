<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class ProgramStudiModel extends Model
{
  protected $table = 'program_studi';
  protected $primaryId = 'id';
  protected $allowedFields = ['nama', 'program_pendidikan', 'akreditasi', 'sk_akreditasi'];

  public function list($search, $offset, $limit, $order, $sort)
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
    $query = $this->select('id, nama as text');
    
    if ($search) {
      $query = $query->like('nama', $search);
    }
    $query = $query->orderBy("nama", "ASC");

    return $query->findAll(10, 0);
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
  }

  public function findById($id)
  {
    return $this->select('id, nama, program_pendidikan, akreditasi, sk_akreditasi')
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
