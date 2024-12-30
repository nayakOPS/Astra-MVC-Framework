<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

/**
 * Class AuthController
 * @package app\controllers
*/

class AuthController extends Controller
{
   public function login()
   {
    //    $this->setLayout('auth');
       return $this->render('login');
   }

   public function register()
   {
        $request = new Request();
        if($request->isPost()){
            return "Handling submitted data";
        }
        // $this->setLayout('auth');
        return $this->render('register');
   }

}