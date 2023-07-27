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
    return $this->select('transkrip_nilai.id, transkrip_nilai.taruna as taruna_id, taruna.nama as taruna, transkrip_nilai.ijazah as ijazah_id, ijazah.nomer_ijazah as ijazah, transkrip_nilai.program_studi as program_studi_id, program_studi.nama as program_studi')
      ->where('transkrip_nilai.id', $id)
      ->join('program_studi', 'program_studi.id = transkrip_nilai.program_studi')
      ->join('ijazah', 'ijazah.id = transkrip_nilai.ijazah')
      ->join('taruna', 'taruna.id = transkrip_nilai.taruna')
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

  public function getTranskripNilai($id)
  {
    return $this->query("select ijazah.nomer_ijazah, taruna.nama as nama_taruna, 
    taruna.nomer_taruna, taruna.foto, taruna.tanggal_lahir,
    kota.nama as nama_kota,  
    program_studi.nama as nama_studi, program_studi.program_pendidikan, program_studi.akreditasi, 
    ijazah.tanggal_yudisium, ijazah.judul_kkw, ijazah.tanggal_ijazah, ijazah.nomer_ijazah,
    matakuliah.kode, matakuliah.matakuliah, matakuliah.sks, matakuliah.semester, 
    nilai.nilai_huruf, nilai.nilai_angka,
    direktur.nama as nama_direktur, direktur.nip as nip_direktur, 
    wakil_direktur.nama as nama_wakil, wakil_direktur.nip as nip_wakil
    FROM transkrip_nilai 
    JOIN taruna ON transkrip_nilai.taruna = taruna.id 
    JOIN program_studi ON transkrip_nilai.program_studi = program_studi.id 
    JOIN ijazah ON transkrip_nilai.ijazah = ijazah.id 
    JOIN nilai ON taruna.id = nilai.taruna 
    JOIN matakuliah ON nilai.matakuliah = matakuliah.id 
    JOIN kota ON taruna.tempat_lahir = kota.id 
    JOIN pejabat AS direktur ON direktur.id = ijazah.direktur 
    JOIN pejabat AS wakil_direktur ON wakil_direktur.id = ijazah.wakil_direktur
    Where transkrip_nilai.id = $id")->getResultArray();
  }
}
