<?php
namespace App\controllers;
use App\ViewManager;
use App\dao\loginDao;


class LoginController extends Controller
{

    public function index(){
        
        $viewManager = $this->container->get(ViewManager::class);
      
        $viewManager->renderTemplate("login.view.html");
    }

    public function login(){
        $email = $_POST['email'];
        $pass = $_POST['passwd'];

        $loginDao = new loginDao();
        $result = $loginDao->getUser($email, $pass)[0];
        if($result){
            parent::returnView('');
        }else{
            parent::returnView('login');
        }
        

    }
}