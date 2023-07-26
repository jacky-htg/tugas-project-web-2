<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['pageTitle'] = 'Home';
        return view('homepage', $data);
    }
}
