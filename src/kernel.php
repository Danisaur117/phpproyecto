<?php
namespace App;

use App\helper\MonoLog;
use App\ViewManager;
use DI\ContainerBuilder;
use Kint;
use App\controllers\IndexController;
use App\routing\Web;

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
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $route = $this->container->get(RoutingManager::class);
        $route->dispatch($httpMethod, $uri, Web::getDispatcher());
     
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