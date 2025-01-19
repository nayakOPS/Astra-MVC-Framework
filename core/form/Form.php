<?php

namespace app\core\form;
use app\core\Model;
use app\core\form\Field;

/**
* Class Form
* @package app\core\form
*/

// This class provides helper methods to create HTML Forms
class Form
{
    // starts the form and returns a new Form instance
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    // close the form tag
    public static function end()
    {
        echo '</form>';
    }

    // creates new form field instances
    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}