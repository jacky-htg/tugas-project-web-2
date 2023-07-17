<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class NilaiModel extends Model
{
  protected $table = 'nilai';
  protected $primaryId = 'id';
  protected $allowedFields = ['taruna', 'nilai_angka', 'nilai_huruf', 'matakuliah'];

  public function getData($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id, taruna, nilai_angka, nilai_huruf, matakuliah');
    if ($search) {
      $query = $query->like('taruna', $search)->orLike('matakuliah', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('taruna', $search)->orLike('matakuliah', $search)->countAllResults();
    }
    return $this->countAllResults();
  }
} 
