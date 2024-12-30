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
    public static string $ROOT_DIR;
    public Request $request; // instance of Request for parsing the HTTP requests
    public Router $router; // instance of Router for handling/managing the routes
    public Response $response; // instance of Response for sending HTTP responses
    public static Application $app; // instance of Application for initializing the core components
    public Controller $controller; // instance of Controller for handling the application logic

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this -> request = new Request();
        $this -> response = new Response();
        $this -> router = new Router($this -> request, $this -> response);

    }

    // delegate the request to the router
    public function run()
    {
        echo $this -> router -> resolve();
    }

    public function getController()
    {
        return $this -> controller;
    }

    public function setController(Controller $controller)
    {
        $this -> controller = $controller;
    }
}