<?php

namespace App\Router;

use App\Core\Routes;

use App\Views\Responses;

class Router{
  function goTo(){
    /*Получаем ссылку и метод*/
    $url = explode('?',$_SERVER['REQUEST_URI']);
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    $routeParameters;

    $routes = new Routes();
      /*Проверяем есть ли такой метод*/
      if(method_exists($routes,$method)){
        /*Проверяем корректность ссылки*/
        if(isset($routes->$method()[$url[0]])){
            /*Если путь правильный то идём дальше*/
          $routeParameters = $routes->$method()[$url[0]];
          $controllerName = $routeParameters['controller'];
          $action = $routeParameters['action'];
          $controller = new $controllerName();
          $controller->$action();
        }else{
          /*Если нет, то возвращаем ошибку*/
          $response = new Responses();
          $response->sendError(400);
        }
      }else{
        /*Если такого метода нет, то возвращаем ошибку Bad Method*/
        $response = new Responses();
        $response->sendError(405);
      }

  }
}

 ?>
