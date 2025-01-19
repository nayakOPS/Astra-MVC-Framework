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
           // Load the POST data into the model
           $registerModel->loadData($request->getBody());
           
           // Validate the model
           if ($registerModel->validate()) {
               // If validation passes, attempt registration
               if ($registerModel->register()) {
                   return 'success';
               }
           } else {
               // Store validation errors
               $errors = $registerModel->errors;
               
               // Debug output for errors (you can remove this in production)
                //    echo '<pre>';
                //    var_dump("from the authcontroller");
                //    var_dump($registerModel->errors);
                //    echo '</pre>';
           }
       }
   
       // Render the view with both model and errors
       return $this->render('register', [
           'model' => $registerModel,
           'errors' => $errors,
           'data' => $request->getBody()
       ]);
   }
}