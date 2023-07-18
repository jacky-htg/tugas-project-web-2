<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PagesController extends BaseController
{
     public function index(){
         return view('index'); 
     }

     public function submitContactUs(){

         // Validation
         $input = $this->validate([
              'name' => 'required',
              'email' => 'required',
              'subject' => 'required',
              'message' => 'required',
              'recaptcha_response' => 'required|verifyrecaptchaV2',
            ],[
              'recaptcha_response' => [
                    'required' => 'Please verify captcha',
              ],
         ]);

         if (!$input) { // Not valid

              $data['validation'] = $this->validator;

              return redirect()->back()->withInput()->with('validation', $this->validator);

         }else{ 
              // Set Session
              session()->setFlashdata('message', 'Request Submitted Successfully!');
              session()->setFlashdata('alert-class', 'alert-success');

         }
         return redirect()->route('/');
     }

}
