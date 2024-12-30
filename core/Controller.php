<?php

namespace app\core;
use app\core\Application;

/**
 * Class Controller
 * @package app\core
*/

class Controller
{
    protected string $layout = 'main';

    protected function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }
    protected function render(string $view, array $params = []): string
    {
        return Application::getInstance()->getRouter()->renderView($view, $params);
    }

    public function getLayout(): string 
    {
        return $this->layout;
    }
}