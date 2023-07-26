<?php

namespace App\Models;

use CodeIgniter\Model;

class ForgotPasswordModel extends Model
{
    protected $table = 'forgot_password';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'token', 'created_at'];

    // Method untuk menyimpan permintaan pemulihan kata sandi
    public function insertRequest($data)
    {
        return $this->insert($data);
    }

    // Method untuk mencari data berdasarkan token
    public function getByToken($token)
    {
        return $this->where('token', $token)->first();
    }

    // Method untuk mencari data berdasarkan email
    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
