<?php

namespace App\Controllers;
use App\Models\ForgotPasswordModel;
use App\Controllers\BaseController;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('users/forgot-password');
    }

    public function requestPasswordReset()
    {
        $email = $this->request->getPost('email');

        // Cek apakah email tersedia di database
        $userModel = new \App\Models\UserModel(); // Gantilah UserModel dengan model yang sesuai dengan tabel pengguna di database Anda
        $user = $userModel->where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Email tidak ditemukan.');
        }

        // Simpan permintaan pemulihan kata sandi ke database
        $forgotPasswordModel = new ForgotPasswordModel();
        $data = [
            'user_id' => $user['id']
        ];
        $forgotPasswordModel->insert($data);

        $forgot = $forgotPasswordModel->getByUserId($user['id']);
        $this->sendEmail($forgot['id'], $email);

        return redirect()->to(base_url('forgot-password'))->with('success', 'Permintaan pemulihan kata sandi telah dikirimkan ke email Anda.');
    }

    public function resetPassword($token)
    {
        $forgotPasswordModel = new ForgotPasswordModel();

        // Cari data berdasarkan token
        $forgotPasswordData = $forgotPasswordModel->getById($token);

        if (!$forgotPasswordData) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token pemulihan kata sandi tidak valid.');
        }

        if ($forgotPasswordData['is_used']) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token sudah digunakan.');
        }

        if (strtotime($forgotPasswordData['created_at']) < strtotime('-3 days')) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token sudah kadaluwarsa.');
        }
        
        // Tampilkan halaman form untuk reset kata sandi
        return view('users/reset-password', ['token' => $token]);
    }

    public function processResetPassword()
    {
        $params = $this->request->getPost(null, FILTER_UNSAFE_RAW); 
        $token = $params['token'];
        $password = $params['password'];

        $forgotPasswordModel = new ForgotPasswordModel();
        $forgotPasswordData = $forgotPasswordModel->getById($token);

        if (!$forgotPasswordData) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token pemulihan kata sandi tidak valid.');
        }

        if ($forgotPasswordData['is_used']) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token sudah digunakan.');
        }

        if (strtotime($forgotPasswordData['created_at']) < strtotime('-3 days')) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token sudah kadaluwarsa.');
        }

        // Lakukan validasi dan ubah kata sandi pengguna di database
        $validationRules = [
            'password' => [
                'required',
                'min_length[10]',
                static function ($value) {
                    if(!preg_match('/[A-Z]/', $value)) return false;
                    if(!preg_match('/[a-z]/', $value)) return false;
                    if(!preg_match('/[0-9]/', $value)) return false;
                    if(!preg_match('/[!@#$%^&*()_+-=`~{}|\;:?>.<,"]/', $value)) return false;
                    return true;
                },
            ],
            'password_confirm' => 'matches[password]'
        ];

        $validationMessages = [
            'password' => [
                'required' => 'Kata sandi harus diisi.',
                'min_length' => 'Kata sandi minimal harus 10 karakter.',
                2 => 'Your Password not strong'
            ],
            'password_confirm' => [
                'matches' => 'Konfirmasi kata sandi tidak sesuai.'
            ]
        ];

        $validation = \Config\Services::validation();
        $validation->setRules($validationRules, $validationMessages);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Ubah kata sandi pengguna di database (gantilah UserModel dengan model yang sesuai dengan tabel pengguna di database Anda)
        $userModel = new \App\Models\UserModel();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $userModel->updateById($forgotPasswordData['user_id'], ['password'=>$passwordHash]);
        
        // update data permintaan pemulihan kata sandi dari tabel telah digunakan
        $forgotPasswordModel->where('BIN_TO_UUID(id)', $token)->update(null, ['is_used' => true]);

        return redirect()->to(base_url('login'))->with('success', 'Kata sandi telah berhasil diubah. Silahkan login dengan kata sandi baru Anda.');
    }

    private function sendEmail($token, $email)
    {
        $url = base_url('reset-password/'.$token);
        $message = "
            <p>Anda telah membuat permintaan reset password, silahkan ganti password Anda dengan meng-klik link berikut: {$url}</p>
        ";
        
        $this->email->initialize($this->emailConfig());
        $this->email->setFrom(getenv('email_config_SMTPUser'), getenv('email_config_senderName'));
        $this->email->setTo($email);
        $this->email->setSubject('Reset Password');
        $this->email->setMessage($message);

        return $this->email->send();
    }
}
