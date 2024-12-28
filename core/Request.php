<?php
// Request handling

namespace app\core;

/**
    * Class Router
    * @author deadpool <kunonner2002@gmail.com>
    * @package app\core
*/

class Request
{
    // extract the path from the request URI (/path?query=example)
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        //  allocate it's position, find query string start
        $position = strpos($path, '?');

        if($position === false){
            return $path;
        }

        return substr($path, 0, $position);
    }

    // extract the method from the request URI (GET, POST, PUT, DELETE) in lowercase
    public function getMethod()
    {
     return strtolower($_SERVER['REQUEST_METHOD']);  
    }
}