<?php 
namespace Config;

class CaptchaValidation{

     public function verifyrecaptchaV2(string $str, ?string &$error = null): bool
     {
          $secretkey = getenv('GOOGLE_RECAPTCHAV2_SECRETKEY');

          if(($str) && !empty($str)) {

               $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretkey."&response=".$str."&remoteip=".$_SERVER['REMOTE_ADDR']);

               $responseData = json_decode($response);
               $score = 0.6; // 0 - 1
               if($responseData->success && $responseData->score > $score) { // Verified
                    return true;
               }
          }

          $error = "Invalid captacha";

          return false;
     }

}