<?php
// Routing, handles the routing logic by associating paths with callbacks and resolving the appropriate one based on the request

namespace app\core;
use app\core\Request;

/**
    * Class Router
    * @package app\core
*/
class Router
{
    private const ALLOWED_METHODS = ['GET', 'POST'];
    protected array $routes = []; // stores registered routes
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this -> request = $request;
        $this -> response = $response;
    }
    public function addRoute(string $method, string $path, $callback): self {
        $method = strtolower($method);
        $this->routes[$method][$path] = $callback;
        return $this;
    }

     // Maintain backwards compatibility
    // Registers a GET route
    public function get(string $path, $callback): self
    {
        return $this->addRoute('GET', $path, $callback);
    }

    public function post(string $path, $callback): self
    {
        return $this->addRoute('POST', $path, $callback);
    }


    // Matches the current path and method to a route and invokes it's callback
    public function resolve()
    {
        $path = $this -> request -> getPath();
        $method = $this -> request ->getMethod();

        /* echo "<pre>";
        var_dump($getMegetMethod);
        echo "</pre>"; */

        $callback = $this -> routes[$method][$path] ?? false;

        if($callback === false){
            $this -> response -> setStatusCode(404);
            return $this -> renderView("_404");
        }

        if(is_string($callback)){
            return $this -> renderView($callback);
        }

        if(is_array($callback)){
            $controller = new $callback[0]();
            Application::getInstance()->setController($controller);
            $callback[0] = $controller;
        }

        /* echo "<pre>";
        var_dump($callback);
        echo "</pre>"; */
        
        return call_user_func($callback,$this->request);
    }

    public function renderView(string $view, array $params = []): string
    {
        $layoutContent = $this -> getlayoutContent();
        $viewContent = $this -> renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        // include_once Application::$ROOT_DIR."/views/$view.php";
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this -> getlayoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function getlayoutContent()
    {
        $app = Application::getInstance();
        $controller = $app->getController();
        $layout = $controller?->getLayout() ?? 'main';
        $layoutFile = $app->getRootDir() . "/views/layouts/$layout.php";

        if (!file_exists($layoutFile)) {
            return ''; // Return empty if layout file does not exist
        }
        
        ob_start(); // output buffering, output caching starting
        include_once $layoutFile; //this is the actual output
        return ob_get_clean(); // clear output caching/buffering
    }

    public function renderOnlyView(string $view, array $params): string
    {
        // echo "<pre>";
        // var_dump($params);
        // echo "</pre>";
        $app = Application::getInstance();
        extract($params); // Create variables from array keys

        // echo "<pre>";
        // var_dump($name);
        // echo "</pre>";

        ob_start(); 
        include_once $app->getRootDir() ."/views/$view.php";
        return ob_get_clean(); 
    }
}