<?php

namespace App;

/*error_reporting(E_ALL & ~E_NOTICE);*/

require_once __DIR__ . '/vendor/autoload.php';

use App\Router\Router;

header('Access-Control-Allow-Origin: *');

/*Создаём новый роут и переходим*/
$router = new Router();
$router->goTo();

?>
