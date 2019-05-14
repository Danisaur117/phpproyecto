<?php
namespace App;

use App\helper\MonoLog;
use DI\ContainerBuilder;
use Kint;

class kernel
{
    public $logger;
    private $container;


    public function __construct()
    {

       $this->logger = new MonoLog();
       $this->container = $this->createContainer();
       $this->container->set(LoggerInterface::class, $this->logger);
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