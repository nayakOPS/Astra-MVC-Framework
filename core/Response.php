<?php

namespace app\core;

/**
    * Class Router
    * @author deadpool <kunonner2002@gmail.com>
    * @package app\core
*/

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}