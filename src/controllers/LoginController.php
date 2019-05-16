<?php
namespace App\controllers;
use App\ViewManager;

class LoginController extends Controller
{

    public function index(){
        
        $viewManager = $this->container->get(ViewManager::class);
      
        $viewManager->renderTemplate("login.view.html");
    }
}