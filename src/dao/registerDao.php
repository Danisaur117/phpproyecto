<?php
 namespace App\dao;
 use App\helper\ConnectMysql;
 use  App\config\configMysql;


 class registerDao
 {

    private $pdo;

    public function __construct(){
       $this->pdo= ConnectMysql::make(configMysql::getConfigDB()['database']);       
    }


    public function saveUser(string $email, string $password){
        try{
            $sql = "INSERT INTO users (email, password) VALUES(?,?)";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$email, $password]);
        }catch(Exception $e){
            die($e);
        }
    }
 }