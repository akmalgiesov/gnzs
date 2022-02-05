<?php

namespace App\Models;

use App\Services\Auth;
use App\Views\Responses;

class Leads{
  /*Параметры авторизации и поля для заполнения*/
  private $authParameters;
  private $fields;

  /*Конструктор определяет значения для заполняемых полей и данных авторизации*/
  public function __construct(){
    $auth = new Auth();
    $this->authParameters = $auth->getAuth();

    $this->fields = [
      "name" => "Lead Of The Age"
    ];

  }

  function create(){

    /*Создаём POST запрос*/
    $curl = curl_init();
    /*Параметры запроса. Здесь всё стандартно*/
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://".$this->authParameters["base_domain"]."/api/v4/leads",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'[
        {
          "name": "'.$this->fields["name"].'"
        }
      ]',
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$this->authParameters["access_token"],
        "Content-Type: application/json"
      ),
    ));

    /*Получаем результат запроса*/
    $curlResponse = curl_exec($curl);
    /*Создаём новый экземпляр класса для ответа*/
    $response = new Responses();

    if (curl_errno($curl)) {
      /*Если во время запроса произошла внутренняя ошибка*/
      $response->sendError(500);
    }else {
      /*Берём код ответа*/
      $resultCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($resultCode != 200){
          /*Если код не равен 200 возвращаем ответ-ошибку*/
          $response->sendError($resultCode);
        }else{
          /*Если код равен 200 возвращаем ответ с отформатированными данными*/
          $result = json_decode($curlResponse,true);
          $data = [
            "ID" => $result["_embedded"]["leads"][0]["id"],
            "Name" => $this->fields["name"]
          ];
          $response->sendResponse($data);
        }


    }

    curl_close($curl);

  }
}
?>
