<?php

namespace App\controllers;
use App\ViewManager;
use DI\Container;
use Kint;

abstract class Controller
{
    protected $container;
    protected $viewManager;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->viewManager = $this->container->get(ViewManager::class);    
    }

    abstract public function index();
     
    protected function returnView($page)
     {
         $host= $_SERVER['HTTP_HOST'];
         $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\'));
         header("Location: http://$host$uri/$page");
     }
}