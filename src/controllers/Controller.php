<?php

namespace App\controllers;
use DI\Container;
use Kint;

abstract class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
              
        $this->container = $container;
    }

    abstract public function index();
     
    protected function returnView($page)
     {
         $host= $_SERVER['HTTP_HOST'];
         $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
         header("Location: http://$host$uri/$page");
     }
}