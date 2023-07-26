<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Users';
        return view('users/index', $data);
    }

    public function create()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['name' => 'required']);
            $validation->setRules(['email' => 'required|valid_email|is_unique[users.email]']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $password = $this->generatePassword(10);
                $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
                $userModel = new UserModel();
                $userModel->insert([
                    "name" => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_DEFAULT),
                ]);
                $user = $userModel->findByEmail($email);
                $user['password'] = $password;
                $this->sendEmail($user);
                // send email to inform the password
                /*$postData = [
                    'from' => ['email' => 'no-reply@rijalasepnugroho.com'],
                    'subject' => 'Welcome to SIAKAD UNSIA',
                    'personalizations' => [[
                        'to' => [['email' => $user['email']]],
                        'dynamic_template_data' => [
                            'name' => $user['name'],
                            'app_name' => 'SIAKAD UNSIA',
                            'username' => $user['email'],
                            'password' => $password,
                            'link' => base_url("users/{$user['id']}/verification")
                        ],
                    ]],
                    'template_id' => getenv('sendgrid_email_verification')
                ];

                $ch = curl_init('https://api.sendgrid.com/v3/mail/send');
                curl_setopt_array($ch, array(
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer ' . getenv('sendgrid_api_key'),
                        'Content-Type: application/json'
                    ),
                    CURLOPT_POSTFIELDS => json_encode($postData)
                ));
                curl_exec($ch);*/

                return redirect('users');
            }
        }
        $data['pageTitle'] = 'Users';
        return view('users/create', $data);
    }

    public function update($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $userModel = new UserModel();
        $data['user'] = $userModel->findById($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['name' => 'required']);
            $validation->setRules(['is_actived' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $userModel->updateById($id, [
                    "name" => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    "is_actived" => $this->request->getPost('is_actived') === 'on' ? true : false,
                ]);

                return redirect('users');
            }
        }
        $data['pageTitle'] = 'Users';
        return view('users/update', $data);
    }

    public function delete($id)
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        if ($this->request->is('post') || $this->request->is('delete')) {
            $userModel = new UserModel();
            $user = $userModel->findById($id);
            if (isset($user['id']) && !empty($user['id'])) {
                $userModel->deleteById($id);
            }
        }
    }

    // public function verification($id)
    // {
    //     $userModel = new UserModel();
    //     $user = $userModel->findById($id);
    //     if (isset($user['id']) && !empty($user['id']) && !$user['is_verified']) {
    //         $userModel->verification($id);
    //     }

    //     return redirect('login');
    // }

    public function list()
    {
        // if (empty($this->session->get('user_id'))) return redirect("login");

        $params = $this->request->getGet(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $draw = $params['draw'];
        $offset = $params['start'];
        $limit = $params['length']; // Rows display per page
        $columnIndex = isset($params['order']) ? $params['order'][0]['column'] : null; // Column index
        $order = ($columnIndex || $columnIndex === '0') ? $params['columns'][$columnIndex]['data'] : null; // Column name
        $sort = $order ? $params['order'][0]['dir'] : null; // asc or desc
        $search = $params['search']['value']; // Search value

        $userModel = new UserModel();
        $count = $userModel->count($search);
        $data = [
            "draw" => intval($draw),
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "data" => $userModel->list($search, $offset, $limit, $order, $sort)
        ];
        return json_encode($data);
    }

    public function logout()
    {
        // if (empty($this->session->get('user_id'))) return redirect('login');
        $this->session->destroy();
        return redirect('login');
    }

    // public function login()
    // {
    //     if (!empty($this->session->get('user_id'))) return redirect("users");

    //     $data["error"] = "";
    //     if ($this->request->is('post')) {
    //         $validation =  \Config\Services::validation();
    //         $validation->setRules(['email' => 'required|valid_email']);
    //         $validation->setRules(['password' => 'required']);
    //         $isDataValid = $validation->withRequest($this->request)->run();

    //         if($isDataValid){
    //             $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
    //             $password = $this->request->getPost('password');
    //             $password = $password ? $password : "";
    //             $userModel = new UserModel();
    //             $user = $userModel->findByEmail($email);
    //             if (!isset($user['id'])) {
    //                 $this->session->setFlashdata('error', 'invalid ID');
    //             } else if (!$user['is_actived']){
    //                 $this->session->setFlashdata('error', 'inactived user');
    //             } else if (!$user['is_verified']){
    //                 $this->session->setFlashdata('error', 'email is not verified');
    //             } else if (!password_verify($password, $user['password'])){
    //                 $this->session->setFlashdata('error', 'Invalid password or username');
    //             } else {  
    //                 $this->session->set('user_id', $user['id']);
    //                 $this->session->set('user_nama', $user['name']);
    //                 return redirect('/');
    //             }
    //             $data['error'] = $this->session->getFlashdata('error');
    //         }
    //     }
    //     return view('users/login', $data);
    // }

    private function sendEmail($user)
    {
        $url = base_url('users/' . $user['id'] . '/verification');
        $message = "
            <p>Welcome to SIAKAD Mr. {$user['name']}.</p>
            <p>Anda telah didaftarkan dalam sistem kami, silahkan masuk dengan menggunakan login:<br/>
                Username : {$user['email']}<br/>
                Password : {$user['password']}
            </p>
            <p>Untuk memverifikasi email Anda, klik link berikut: {$url}</p>
        ";

        $this->email->initialize($this->emailConfig());
        $this->email->setFrom(getenv('email_config_SMTPUser'), getenv('email_config_senderName'));
        $this->email->setTo($user['email']);
        $this->email->setSubject('Email Verification');
        $this->email->setMessage($message);

        return $this->email->send();
    }

    private function generatePassword($length)
    {
        $specialChar = " !@#$%^&*\"'()+,-./:;<=>?[]\\_`{}|~";
        $lowercase = "abcdefghijklmnopqrstuvwxyz";
        $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $number = "1234567890";

        $randomString = '';
        $randomString .= $specialChar[rand(0, strlen($specialChar) - 1)];
        $randomString .= $lowercase[rand(0, strlen($lowercase) - 1)];
        $randomString .= $uppercase[rand(0, strlen($uppercase) - 1)];
        $randomString .= $number[rand(0, strlen($number) - 1)];

        $characters = $specialChar . $lowercase . $uppercase . $number;
        $charactersLength = strlen($characters);
        for ($i = 0; $i < ($length - 4); $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return str_shuffle($randomString);
    }
}
