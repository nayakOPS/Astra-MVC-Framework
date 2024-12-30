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
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);  
    }

    public function isGet()
    {
        return $this -> method() === 'get';
    }
    public function isPost()
    {
        return $this -> method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if($this -> method() === 'get'){
            foreach($_GET as $key => $value){
                // removing invalid characters from the request and storing in the body array
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this -> method() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}