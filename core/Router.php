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
    protected array $routes = []; // stores registered routes

    /**
     * Router constructor.
     * @param \app\core\Request $request
    */

    public function __construct(Request $request)
    {
        $this -> request = $request;
    }

    // Registers a GET route
    public function get($path, $callback)
    {
        $this -> routes['get'][$path] = $callback;
    }


    // Matches the current path and method to a route and invokes it's callback
    public function resolve()
    {
        $path = $this -> request -> getPath();
        $method = $this -> request -> getMethod();
        $callback = $this -> routes[$method][$path] ?? false;
        echo "<pre>";
        var_dump($callback);
        echo "</pre>";
    }
}