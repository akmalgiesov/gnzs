<?php

namespace App\Services;

class Auth{

  private $xClientId;

  public function __construct(){
    $this->xClientId = 29982469;
  }

  function getAuth(){

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://test.gnzs.ru/oauth/get-token.php',
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'X-Client-Id:'.$this->xClientId,
      ),
    ));

    $response = curl_exec($curl);

    return curl_errno($curl) ? false : json_decode($response,true);

    curl_close($curl);

  }
}

 ?>
