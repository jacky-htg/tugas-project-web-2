<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class TranskripModel extends Model
{
  protected $table = "transkrip_nilai";
  protected $primaryId = 'id';
  protected $allowedFields = ['taruna', 'ijazah', 'program_studi'];

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
} 
