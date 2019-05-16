<?php
namespace App\dao;

use App\helper\ConnectMysql;
use  App\config\configMysql;

class Dao{
    protected $pdo;

    public function __construct(){
       $this->pdo= ConnectMysql::make(configMysql::getConfigDB()['database']);       
    }
}