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
    $query = $this->select('nilai.id as DT_RowId, taruna.nama as taruna, nilai.nilai_angka, nilai.nilai_huruf, matakuliah.matakuliah as matakuliah');
    if ($search) {
      $query = $query->like('taruna.nama', $search)->orLike('matakuliah.nama', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->join('taruna', 'nilai.taruna = taruna.id')
                ->join('matakuliah', 'nilai.matakuliah = matakuliah.id')
                ->findAll($limit, $offset);
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('taruna', $search)->orLike('matakuliah', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findById($id)
  {
    return $this->select('nilai.id, nilai.taruna taruna_id, taruna.nama taruna, nilai.matakuliah matakuliah_id, matakuliah.matakuliah, nilai.nilai_angka, nilai.nilai_huruf')
                ->join('taruna', 'nilai.taruna = taruna.id')
                ->join('matakuliah', 'nilai.matakuliah = matakuliah.id')
                ->where('nilai.id', $id)
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
