<?php
namespace App;

use App\helper\MonoLog;
use App\ViewManager;
use DI\ContainerBuilder;
use Kint;
use App\controllers\IndexController;

class kernel
{
    public $logger;
    private $container;


    public function __construct()
    {

       $this->logger = new MonoLog();
       $this->container = $this->createContainer();
       $this->container->set(LoggerInterface::class, $this->logger);
       
    }

    public function init()
    {
       
        $this->logger->info('Kernel up');
        $indexController = new IndexController($this->container);
        $indexController->index();
     
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

   public static function getProjectDir():string
   {
       return dirname(__DIR__);
   } 

}