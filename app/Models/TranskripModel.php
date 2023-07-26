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
    $query = $this->select('transkrip_nilai.id as DT_RowId, taruna.nama as taruna, ijazah.nomer_ijazah as ijazah, program_studi.nama as program_studi');
    if ($search) {
      $query = $query->like('taruna.nama', $search)->orLike('ijazah.nomer_ijazah', $search)->orLike('program_studi.nama', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->join('taruna', 'transkrip_nilai.taruna = taruna.id')
      ->join('ijazah', 'transkrip_nilai.ijazah = ijazah.id')
      ->join('program_studi', 'transkrip_nilai.program_studi = program_studi.id')
      ->findAll($limit, $offset);
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
 69-mengintegrasikan-view-transkrip-nilai-ke-database
    return $this->select('transkrip_nilai.id, transkrip_nilai.taruna, transkrip_nilai.ijazah as ijazah_id, ijazah.nomer_ijazah as ijazah, transkrip_nilai.program_studi as program_studi_id, program_studi.nama as program_studi')
      ->where('transkrip_nilai.id', $id)
      ->join('program_studi', 'program_studi.id = transkrip_nilai.program_studi')
      ->join('ijazah', 'ijazah.id = transkrip_nilai.ijazah')
      ->first();

    return $this->select('transkrip_nilai.id, transkrip_nilai.taruna as taruna_id, taruna.nama as taruna, transkrip_nilai.ijazah as ijazah_id, ijazah.nomer_ijazah as ijazah, transkrip_nilai.program_studi as program_studi_id, program_studi.nama as program_studi')
                ->where('transkrip_nilai.id', $id)
                ->join('program_studi', 'program_studi.id = transkrip_nilai.program_studi')
                ->join('ijazah', 'ijazah.id = transkrip_nilai.ijazah')
                ->join('taruna', 'taruna.id = transkrip_nilai.taruna')
                ->first();
 main
  }

  public function updateById($id, $data)
  {
    return $this->where('id', $id)->update(null, $data);
  }

  public function deleteTranskrip($id)
  {
    $this->delete($id);
  }

  public function getTranskripNilai($id)
  {
    return $this->select('ijazah.nomer_ijazah as nomer_ijazah, taruna.nama as nama, taruna.nomer_taruna as nomor_taruna, taruna.tempat_lahir as tempat_lahir, taruna.tanggal_lahir as tanggal_lahir, program_studi.nama as jurusan, program_studi.akreditasi as status, program_studi.program_pendidikan as pendidikan, ijazah.tanggal_yudisium as tanggal_yudisium')
      ->where('transkrip_nilai.id', $id)
      ->join('ijazah', 'ijazah.id = transkrip_nilai.ijazah')
      ->join('taruna', 'taruna.id = transkrip_nilai.taruna')
      ->join('program_studi', 'program_studi.id = transkrip_nilai.program_studi')
      ->first();
  }
}

class MatakuliahModel extends Model
{
  protected $table = "matakuliah";
  protected $primaryId = 'id';
  protected $allowedFields = ['kode', 'matakuliah', 'sks', 'nilai_angka', 'nilai_huruf', 'semester'];

  public function getAllMatakuliah($id)
  {
    return $this->findAll($id);
  }
  public function countMatakuliah($id)
  {
    return $this->countAllResults($id);
  }
}
