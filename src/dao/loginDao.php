<?php
namespace App\dao;
use Kint;
class loginDao extends Dao
{

    public function getUser(string $email, string $password){

        $sql= "select * from users where email='$email' and password='$password';";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;


    }
}