<?php
namespace App\controllers;
use App\ViewManager;
use Kint;

class IndexController extends Controller
{
   public function index(){
      $this->viewManager->renderTemplate("index.view.html");
   }

}