<?php
namespace App\controllers;
use App\ViewManager;
use App\SessionManager;

class AdminController extends Controller
{

   public function index()
   {

    $user = SessionManager::get("user");
    if($user){
    $viewManager = $this->container->get(ViewManager::class);
      
    $viewManager->renderTemplate("admin.view.html");
    } else{
        parent::returnView("login");
    }
   }

}