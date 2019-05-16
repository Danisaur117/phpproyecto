<?php
namespace App\controllers;
use App\ViewManager;
use App\dao\registerDao;
use Kint;

class RegisterController extends Controller
{
   public function index(){

       $viewManager = $this->container->get(ViewManager::class);
      
       $viewManager->renderTemplate("register.view.html");
   }

   public function register(){
       $email = $_POST['email'];
       $password = $_POST['passwd'];

       $registerDao = new registerDao();
       $registerDao->saveUser($email, $password);
       parent::returnView('');

   }

}