<?php
namespace App;


use Twig;

class ViewManager
{
    protected $twig;
    private $logger;


    public function __construct ()
    {
       $loader = new \Twig\Loader\FilesystemLoader(Kernel::getProjectDir().'/templates');
       $this->twig = new \Twig\Environment($loader);

    }

    public function  render($view, $args=[])
    {
        if($args !=null){
            extract($args, EXTR_SKIP);
        }
        $file = Kernel::getProjectDir()."/templates/".$view;
        if(is_readable($file)){
            require $file;
        } else {
            
                throw new \InvalidArgumentException();
            
        }

    }

    public function renderTemplate( $template, $args=[])
    {
        echo $this->render($template, $args);
    }

}