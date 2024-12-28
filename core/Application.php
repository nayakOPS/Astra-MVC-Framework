<?php
// Application entry point, handles the initialization and orchastration of core component(Request and Router)

namespace app\core;

/**
    * Class Router
    * @author deadpool <kunonner2002@gmail.com>
    * @package app\core
*/

class Application
{
    public Request $request; // instance of Request for parsing the HTTP requests
    public Router $router; // instance of Router for handling/managing the routes

    public function __construct()
    {
        $this -> request = new Request();
        $this -> router = new Router($this -> request);

    }

    // delegate the request to the router
    public function run()
    {
        $this -> router -> resolve();
    }
}