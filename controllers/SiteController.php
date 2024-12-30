<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class SiteController
 * @package app\controllers
*/

class SiteController extends Controller
{
    public function showContactForm()
    {
        return $this->render('contact');
    }

    public function submitContactForm(Request $request)
    {
        $body = $request->getBody();
        // Logic to handle contact data
        return "Handling submitted data";
    }
   
    public function home()
    {
        $params = [
            'name' => "The Astra Framework"
        ];
        return $this->render('home', $params);
    }
}