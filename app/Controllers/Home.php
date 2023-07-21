<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (empty($this->session->get('user_id'))) return redirect("login");
        $data['pageTitle'] = 'Home';
        return view('homepage', $data);
    }
}
