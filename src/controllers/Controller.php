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

}