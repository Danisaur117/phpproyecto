<?php
namespace App\helper;
use App\interfaces\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonoLog implements  LoggerInterface
{
    private $logger;
    
    public function __construct()
    {
        $this->logger = new Logger('Kernel');
        $this->logger->pushHandler(new StreamHandler(dirname(__DIR__).'/var/log/prod.log'), Logger::DEBUG);
    }

    public function getLogger():LoggerInterface
    {
        return $this->logger;
    }

    public function info(string $message)
    {
            $this->logger->info($message);
    }


    public function warning(string $message)
    {
        $this->logger->warning($message);
    }

    public function error(string $message)
    {
       $this->logger->error($message);
    }

}