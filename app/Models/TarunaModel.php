<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class TarunaModel extends Model
{
  protected $table = 'taruna';
  protected $primaryId = 'id';
  protected $allowedFields = ['nama' , 'nomer_taruna' , 'tempat_lahir' , 'tanggal_lahir' , 'program_studi' , 'foto'];

  public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('id as DT_RowId, nama, nomer_taruna, tempat_lahir, tanggal_lahir, program_studi, foto');
    if ($search) {
      $query = $query->like('nama', $search)->orLike('nomer_taruna', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function lookup($search)
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
      return $this->like('nama', $search)->orLike('nomer_taruna', $search)->countAllResults();
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
    return $this->select('id, nama, nomer_taruna, tempat_lahir, tanggal_lahir, program_studi, foto')
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
