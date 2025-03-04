<?php

namespace app\core\form;
use app\core\Model;

/**
* Class Field
* @package app\core\form
*/

// handles individual form fields
class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public string $type;
    public Model $model;
    public string $attribute;

    /**
     * Field Constructor
     * @param \app\core\Model $model;
     * @param string $atrribute;
     */
    public function __construct(Model $model, string $attribute)
    {
        $this -> type = self::TYPE_TEXT;
        $this -> model = $model;
        $this -> attribute = $attribute;
    }

    public function __tostring()
    {
        return sprintf('
            <div class="form-group">
                <input type="%s" name="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ', $this->type,
                   $this->attribute,
                   $this->model->{$this->attribute},
                   $this->model->hasError($this->attribute) ? 'is-invalid':'',
                   $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}