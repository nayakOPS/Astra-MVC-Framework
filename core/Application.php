<?php
// Application entry point, handles the initialization and orchastration of core component(Request and Router)

namespace app\core;

/**
    * Class Application
    * @package app\core
*/

class Application
{
    private static ?self $instance = null; //ensures only one Application instance exists
    private static string $rootDir;
    private Request $request;
    private Router $router;
    private Response $response;
    private ?Controller $controller = null;

    private function __construct(string $rootDir)
    {
        self::$rootDir = $rootDir;
        $this -> request = new Request();
        $this -> response = new Response();
        $this -> router = new Router($this -> request, $this -> response);

    }

    public static function getInstance(string $rootDir = ''): self 
    {
        if (self::$instance === null) {
            self::$instance = new self($rootDir);
        }
        return self::$instance;
    }

    // delegate the request to the router
    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode(500);
            echo $this->router->renderView('_error', ['error' => $e->getMessage()]);
        }
    }

    // getters and setters
    public function getRootDir(): string
    { 
        return self::$rootDir; 
    }
    public function getRouter(): Router 
    { 
        return $this->router;
    }
    public function getRequest(): Request 
    { 
        return $this->request; 
    }
    public function getResponse(): Response 
    { 
        return $this->response; 
    }
    public function getController(): ?Controller
    {
        return $this -> controller;
    }
    public function setController(Controller $controller): void
    {
        $this -> controller = $controller;
    }
}