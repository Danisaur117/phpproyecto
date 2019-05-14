<?php
namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use DI\ContainerBuilder;
use Kint;

class kernel
{
    public $logger;
    private $container;


    public function __construct()
    {
        $this->logger = new Logger('Kernel');
        $this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/log/prod.log'), Logger::DEBUG);
        $this->container = $this->createContainer();
       // Kint::dump($this->container);
    }

    public function init()
    {
       
        $this->logger->info('Kernel up');
        echo "<h1>Arrancado kernel</h1>";
    }


    //create container builder
    public function createContainer()
    {
      //Create instance
      $containerBuilder = new ContainerBuilder();

      //Autowiring true 
      $containerBuilder->useAutowiring(true);

      //Create container
      return $containerBuilder->build();

    }
}