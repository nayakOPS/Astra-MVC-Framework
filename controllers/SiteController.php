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
    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        echo "<pre>";
        var_dump($body);
        echo "</pre>";
        
        return "hadnling submitted data";
    }

    public function contact()
    {

        // Render the 'contact' view
        return $this->render('contact');
    }

    public function home()
    {
        $params = [
            'name' => "The Astra Framework"
        ];
        // Render the 'home' view
        return $this->render('home', $params);
    }
}