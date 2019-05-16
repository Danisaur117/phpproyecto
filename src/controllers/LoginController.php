<?php
namespace App\controllers;
use App\ViewManager;
use App\SessionManager;
use App\dao\loginDao;


class LoginController extends Controller
{

    public function index(){
        $this->viewManager->renderTemplate("login.view.html");
    }

    public function login(){
        $email = $_POST['email'];
        $pass = $_POST['passwd'];

        $loginDao = new loginDao();
        $result = $loginDao->getUser($email, $pass)[0];
        if($result){
            SessionManager::put('user',$result);
            parent::returnView('admin');
        }else{
            parent::returnView('login');
        }
        

    }
}