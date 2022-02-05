<?php

namespace App\Views;

/*Класс для возврата ответов*/
class Responses{
  /*Возвращаем успешный ответ. Метод принимает параметр - данные для ответа*/
  function sendResponse($response){
    header('Content-Type: application/json');
    print_r(json_encode($response));
  }

  /*Возвращаем ошибку. Метод принимает код ошибки как параметр*/
  function sendError($errorCode){
    header('Content-Type: application/json');
    http_response_code($errorCode);
  }
}

?>
