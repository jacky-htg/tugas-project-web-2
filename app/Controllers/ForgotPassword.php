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

        // Buat token unik untuk pemulihan kata sandi
        $token = bin2hex(random_bytes(32));

        // Simpan permintaan pemulihan kata sandi ke database
        $forgotPasswordModel = new ForgotPasswordModel();
        $data = [
            'email' => $email,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $forgotPasswordModel->insertRequest($data);

        // Kirim email dengan tautan pemulihan kata sandi ke pengguna (gunakan library email CI4 untuk mengirim email)
        $emailMessage = 'Klik tautan berikut untuk mereset kata sandi Anda: ' . base_url('reset-password/' . $token);
        // Kirim email dengan menggunakan library email CI4
        $email = \Config\Services::email();
        $email->setTo($email);
        $email->setSubject('Permintaan Pemulihan Kata Sandi');
        $email->setMessage($emailMessage);
        $email->send();

        return redirect()->to(base_url('forgot-password'))->with('success', 'Permintaan pemulihan kata sandi telah dikirimkan ke email Anda.');
    }

    public function resetPassword($token)
    {
        $forgotPasswordModel = new ForgotPasswordModel();

        // Cari data berdasarkan token
        $forgotPasswordData = $forgotPasswordModel->getByToken($token);

        if (!$forgotPasswordData) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token pemulihan kata sandi tidak valid.');
        }

        // Tampilkan halaman form untuk reset kata sandi
        return view('users/reset-password', ['token' => $token]);
    }

    public function processResetPassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        $forgotPasswordModel = new ForgotPasswordModel();
        $forgotPasswordData = $forgotPasswordModel->getByToken($token);

        if (!$forgotPasswordData) {
            return redirect()->to(base_url('reset-password'))->with('error', 'Token pemulihan kata sandi tidak valid.');
        }

        $email = $forgotPasswordData['email'];

        // Lakukan validasi dan ubah kata sandi pengguna di database
        $validationRules = [
            'password' => 'required|min_length[8]',
            'password_confirm' => 'matches[password]'
        ];

        $validationMessages = [
            'password' => [
                'required' => 'Kata sandi harus diisi.',
                'min_length' => 'Kata sandi minimal harus 8 karakter.'
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
        $userModel->update(['email' => $email], ['password' => password_hash($password, PASSWORD_BCRYPT)]);

        // Hapus data permintaan pemulihan kata sandi dari tabel
        $forgotPasswordModel->where('token', $token)->delete();

        return redirect()->to(base_url('users/login'))->with('success', 'Kata sandi telah berhasil diubah. Silahkan login dengan kata sandi baru Anda.');
    }
}
