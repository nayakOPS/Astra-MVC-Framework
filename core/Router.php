<?php
// Routing, handles the routing logic by associating paths with callbacks and resolving the appropriate one based on the request

namespace app\core;
use app\core\Request;

/**
    * Class Router
    * @author deadpool <kunonner2002@gmail.com>
    * @package app\core
*/
class Router
{
    public Request $request; // stores the incoming request instance
    public Response $response;
    protected array $routes = []; // stores registered routes

    /**
     * Router constructor.
     * @param \app\core\Request $request
    */

    public function __construct(Request $request, Response $response)
    {
        $this -> request = $request;
        $this -> response = $response;
    }

    // Registers a GET route
    public function get($path, $callback)
    {
        $this -> routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this -> routes['post'][$path] = $callback;
    }


    // Matches the current path and method to a route and invokes it's callback
    public function resolve()
    {
        $path = $this -> request -> getPath();
        $method = $this -> request -> method();

        /* echo "<pre>";
        var_dump($method);
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
            Application::$app -> controller = new $callback[0]();
            $callback[0] = Application::$app -> controller;
        }

        /* echo "<pre>";
        var_dump($callback);
        echo "</pre>"; */
        
        return call_user_func($callback,$this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this -> layoutContent();
        $viewContent = $this -> renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        // include_once Application::$ROOT_DIR."/views/$view.php";
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this -> layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app -> controller -> layout ?? 'main'; // Default to 'main'
        $layoutFile = Application::$ROOT_DIR . "/views/layouts/$layout.php";

        if (!file_exists($layoutFile)) {
            return ''; // Return empty if layout file does not exist
        }
        
        ob_start(); // output buffering, output caching starting
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php"; //this is the actual output
        return ob_get_clean(); // clear output caching/buffering
    }

    public function renderOnlyView($view, $params)
    {
        // echo "<pre>";
        // var_dump($params);
        // echo "</pre>";

        // iterating over the passed params array
        foreach($params as $key => $value){
            /**
             * The double dollar sign ($$) in PHP is used for variable variables.
             * This means that the value of one variable is used as the name of another variable.
             * For example, if $key contains the string 'variableName', then $$key is equivalent to $variableName.
             * This allows for dynamic variable naming and access.
             */
            $$key = $value;
        }

        // echo "<pre>";
        // var_dump($name);
        // echo "</pre>";

        ob_start(); 
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean(); 
    }
}