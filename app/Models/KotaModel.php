<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class KotaModel extends Model
{
  protected $table = 'kota';
  protected $primaryId = 'id';
  protected $allowedFields = ['kode_kota', 'nama'];

  public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id as DT_RowId, kode_kota, nama');
    if ($search) {
      $query = $query->like('kode_kota', $search)->orLike('nama', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function lookup($search)
  {
    $query = $this->select('id, nama as text');
    
    if ($search) {
      $query = $query->like('nama', $search);
    }
    $query = $query->orderBy("nama", "ASC");

    return $query->findAll();
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('kode_kota', $search)->orLike('nama', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findById($id)
  {
    return $this->select('id, kode_kota, nama')
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
