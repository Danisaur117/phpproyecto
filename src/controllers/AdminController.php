<?php
namespace App\controllers;

use App\SessionManager;

class AdminController extends Controller
{

   public function index()
   {

    $user = SessionManager::get("user");
    if($user){
        $this->viewManager->renderTemplate("admin.view.html");
    } else{
        parent::returnView("login");
    }
   }

}