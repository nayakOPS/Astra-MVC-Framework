<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

/**
 * Class AuthController
 * @package app\controllers
*/

class AuthController extends Controller
{
   public function login(Request $request)
   {
        if ($request->isPost()) {
            return "Handling login data";
        }
       return $this->render('login');
   }

   public function register(Request $request)
   {
    $registerModel = new RegisterModel();
    $errors = [];

        if ($request->isPost()) {
            if($registerModel -> validate() && $registerModel->register()){
                return 'success';
            }
            echo '<pre>';
            var_dump($registerModel->errors);
            echo '</pre>';
            if (empty($errors)) {
                return "Registration successful!"; // Simulating success without saving
            }
        }

        return $this->render('register', [
            'errors' => $errors,
            'data' => $request->getBody()
        ]);
    }
}