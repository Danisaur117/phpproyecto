<?php
namespace App\config;

class configMysql
{
  public static function getConfigDB(){
      return[
          'database'=>[
              'name'=>'valfeb19',
              'username'=>'root',
              'password'=>'44865710',
              'connection'=>'mysql:host=127.0.0.1'
              //'options'=>''
            ]
        ];
  }

}