<?php

namespace App\Controllers;

use App\Models\Contacts;
use App\Models\Companies;
use App\Models\Leads;
use App\Views\Responses;

class ApiController{

  function createContacts(){
    /*Создаём новые контакты*/
    $contacts = new Contacts();
    $result = $contacts->create();
  }

  function createLeads(){
    /*Создаём новые сделки*/
    $leads = new Leads();
    $result = $leads->create();
  }

  function createCompanies(){
    /*Создаём новые компании*/
    $companies = new Companies();
    $result = $companies->create();
  }
}
?>
