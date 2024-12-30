<?php
// Request handling

namespace app\core;

/**
    * Class Request
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
        return $position === false ? $path : substr($path, 0, $position);
    }

    // extract the method from the request URI (GET, POST, PUT, DELETE) in lowercase
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);  
    }

    public function isGet():bool
    {
        return $this -> getMethod() === 'get';
    }
    public function isPost()
    {
        return $this -> getMethod() === 'post';
    }

    public function getBody()
    {
        $body = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}