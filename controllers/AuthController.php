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
            // Assign data to the model
            $data = $request->getBody();
            $registerModel->fullname = $data['name'] ?? '';
            $registerModel->email = $data['email'] ?? '';
            $registerModel->password = $data['password'] ?? '';
            $registerModel->passwordConfirm = $data['confirm_password'] ?? '';

            // Validate data
            $errors = $registerModel->validate();

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