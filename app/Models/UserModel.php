<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryId = 'id';
  protected $allowedFields = ['name', 'email', 'password', 'is_actived', 'is_verified'];

  public function list($search, $offset, $limit, $order, $sort)
  {
    $query = $this->select('bin_to_uuid(id) as DT_RowId, name, email, is_actived, is_verified');
    if ($search) {
      $query = $query->like('name', $search)->orLike('email', $search);
    }
    if (!empty($order) && !empty($sort)) {
      $query = $query->orderBy($order, $sort);
    }
    return $query->findAll($limit, $offset);
  }

  public function count($search)
  {
    if ($search) {
      return $this->like('name', $search)->orLike('email', $search)->countAllResults();
    }
    return $this->countAllResults();
  }

  public function findByEmail($email)
  {
    return $this->select('bin_to_uuid(id) as id, name, email, password, is_actived, is_verified')
                ->where('email', $email)
                ->first();
  }

  public function findById($id)
  {
    return $this->select('bin_to_uuid(id) as id, name, is_actived, is_verified')
                ->where('BIN_TO_UUID(id)', $id)
                ->first();
  }

  public function verification($id)
  {
    return $this->set('is_verified', true)->where('BIN_TO_UUID(id)', $id)->update();
  }

  public function updateById($id, $data)
  {
    return $this->where('BIN_TO_UUID(id)', $id)->update(null, $data);
  }

  public function deleteById($id)
  {
    return $this->where('BIN_TO_UUID(id)', $id)->delete();
  }
} 
