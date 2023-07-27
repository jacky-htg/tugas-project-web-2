<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class IjazahModel extends Model
{
  protected $table = 'ijazah';
  protected $primaryId = 'id';

  // field yang boleh diinput dari front end
  protected $allowedFields = [
    'taruna',
    'program_studi',
    'tanggal_ijazah',
    'tanggal_pengesahan',
    'gelar_akademik',
    'nomer_sk',
    'wakil_direktur',
    'direktur',
    'nomer_ijazah',
    'nomer_seri',
    'tanggal_yudisium',
    'judul_kkw',
    'nilai_kkw'
  ];

  // function list return array
  public function list($search, $offset, $limit, $order, $sort)
  {
    // Query data dari database
    $query = $this->select('
   ijazah.id DT_RowId,
   ijazah.taruna taruna_id, 
   taruna.nama taruna, 
   ijazah.program_studi program_studi_id,
   program_studi.nama program_studi, 
   tanggal_ijazah, 
   tanggal_pengesahan, 
   gelar_akademik, 
   nomer_sk, 
   ijazah.wakil_direktur wakil_direktur_id,
   wakil_direktur.nama as wakil_direktur, 
   ijazah.direktur direktur_id,
   direktur.nama as direktur,
   nomer_ijazah, 
   tanggal_lahir, 
   program_pendidikan,
   nomer_seri,
   tanggal_yudisium, 
   judul_kkw, 
   nilai_kkw')
   ->join('taruna' , 'taruna.id = ijazah.taruna')
   ->join('program_studi', 'program_studi.id = ijazah.program_studi')
   ->join('pejabat as direktur', 'direktur.id = ijazah.direktur')
   ->join('pejabat as wakil_direktur', 'wakil_direktur.id = ijazah.wakil_direktur');

    // Jika user mencari data dengan menginput kolom search
    if ($search) {
      $query = $query->like('taruna.nama', $search)
        ->orLike('program_studi.nama', $search);
    }

    // Jika user/fe melakukan order dan sort data
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    } else if (!empty($order)) {
      // Jika user/fe hanya melakukan order, maka default sort = desc
      // refer ke default variable di controller
      $query = $query->orderBy($order, $sort);
    } else if (!empty($sort)) {
      // Jika user/fe hanya melakukan sort, maka default kolom order pakai id
      $query = $query->orderBy('ijazah.id', $sort);
    }

    // Jika user/fe melakukan limit data
    if (!empty($limit)) {
      $query = $query->limit($limit);
    }

    // Jika user/fe melakukan offset data
    if (!empty($offset)) {
      $query = $query->offset($offset);
    }

    // Return data dengan pagination
    return $query->paginate($limit);
  }

  public function lookup($search)
  {
    // Query data dari database
    $query = $this->select('id, nomer_ijazah as text');

    if ($search) {
      $query = $query->like('nomer_ijazah', $search);
    }
    $query = $query->orderBy("nomer_ijazah", "ASC");

    return $query->findAll(10, 0);
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('nomer_ijazah', $search)->orLike('nomer_seri', $search)->orLike('judul_kkw', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findById($id)
  {
    return $this->select('ijazah.id, 
    ijazah.taruna taruna_id, 
    taruna.nama taruna, 
    taruna.nomer_taruna nomer_taruna,
    kota.nama as tempat_lahir,
    taruna.tanggal_lahir tanggal_lahir,
    ijazah.program_studi program_studi_id,
    program_studi.nama program_studi, 
    program_studi.program_pendidikan program_pendidikan,
    program_studi.akreditasi akreditasi,
    program_studi.sk_akreditasi sk_akreditasi,
    tanggal_ijazah, 
    tanggal_pengesahan, 
    gelar_akademik, 
    nomer_sk, 
    ijazah.wakil_direktur wakil_direktur_id,
    wakil_direktur.nama as wakil_direktur, 
    ijazah.direktur direktur_id,
    direktur.nama as direktur,
    direktur.nip as direktur_nip,
    wakil_direktur.nip as wakil_direktur_nip,
    nomer_ijazah, 
    nomer_seri,
    tanggal_yudisium, 
    judul_kkw, 
    nilai_kkw')
        ->join('taruna' , 'taruna.id = ijazah.taruna')
        ->join('program_studi', 'program_studi.id = ijazah.program_studi')
        ->join('pejabat as direktur', 'direktur.id = ijazah.direktur')
        ->join('pejabat as wakil_direktur', 'wakil_direktur.id = ijazah.wakil_direktur')
        ->join('kota' , 'kota.id = taruna.tempat_lahir')
        ->where('ijazah.id', $id)
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
