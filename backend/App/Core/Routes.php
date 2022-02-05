<?php

namespace App\Core;

class Routes{
  /*Функция возвращет роут и контроллер по запрашиваемому методу*/
  function post(){
  return [
    '/api/contacts' => [
      'controller' => 'App\Controllers\ApiController',
      'action' => 'createContacts',
    ],
    '/api/leads' => [
      'controller' => 'App\Controllers\ApiController',
      'action' => 'createLeads',
    ],
    '/api/companies' => [
      'controller' => 'App\Controllers\ApiController',
      'action' => 'createCompanies',
    ],
  ];
}
}

 ?>
