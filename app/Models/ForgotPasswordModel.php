<?php

namespace App\Models;

use CodeIgniter\Model;

class ForgotPasswordModel extends Model
{
    protected $table = 'request_passwords';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'is_used', 'created_at'];

    public function getById($id)
    {
        return $this->select('BIN_TO_UUID(id) as id, BIN_TO_UUID(user_id) as user_id, is_used, created_at')
                    ->where('BIN_TO_UUID(id)', $id)->first();
    }

    public function getByUserId($userId)
    {
        return $this->select('BIN_TO_UUID(id) as id, is_used, created_at')
                    ->where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->first();
    }
}
