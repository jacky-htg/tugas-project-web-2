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
    $query = $this->select('taruna.id as DT_RowId, taruna.nama as nama, taruna.nomer_taruna as nomer_taruna, kota.nama as tempat_lahir, taruna.tanggal_lahir as tanggal_lahir, program_studi.nama as program_studi, taruna.foto as foto');
    if ($search) {
      $query = $query->like('taruna.nama', $search)->orLike('taruna.nomer_taruna', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->join('kota',' taruna.tempat_lahir= kota.id')
        ->join('program_studi',' taruna.program_studi= program_studi.id')
        ->findAll($limit, $offset);
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
      return $this->like('nama', $search)->orLike('nomer_taruna', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findById($id)
  {
    return $this->select('taruna.id as id, taruna.nama as nama, taruna.nomer_taruna as nomer_taruna, kota.id as kota_id, kota.nama as tempat_lahir, taruna.tanggal_lahir as tanggal_lahir, program_studi.nama as program_studi, taruna.foto as foto')
        ->join('kota',' taruna.tempat_lahir= kota.id')
        ->join('program_studi',' taruna.program_studi= program_studi.id')
        ->where('taruna.id', $id)
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
