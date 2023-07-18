<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class TranskripModel extends Model
{
  protected $table = "transkrip_nilai";
  protected $primaryId = 'id';
  protected $allowedFields = ['taruna', 'ijazah', 'program_studi'];

  public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id as DT_RowId, taruna, ijazah, program_studi');
    if ($search) {
      $query = $query->like('taruna', $search)->orLike('ijazah', $search)->orLike('program_studi', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function lookup($search)
  {
    $query = $this->select('id, taruna');
    
    if ($search) {
      $query = $query->like('taruna', $search);
    }
    $query = $query->orderBy("taruna", "ASC");

    return $query->findAll();
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('taruna', $search)->orLike('ijazah', $search)->orLike('program_studi', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findById($id)
  {
    return $this->select('id, taruna, ijazah, program_studi')
                ->where('id', $id)
                ->first();
  }

  public function updateById($id, $data)
  {
    return $this->where('id', $id)->update(null, $data);
  }

  public function deleteTranskrip($id)
  {
      $this->delete($id);
  }


} 
