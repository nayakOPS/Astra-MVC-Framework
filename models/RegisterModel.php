<?php

namespace app\models;

use app\core\Model;

/**
 * Class RegisterModel
 * @package app\models
 */
class RegisterModel extends Model
{
    public string $fullname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function register()
    {
        echo "creating/registering the user";
    }

    /**
     * Define validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'fullname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 24],[ self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    /**
     * Validate the registration input
     * 
     * @return array Validation errors
     */
    public function validate(): array
    {
        $errors = [];
        $rules = $this->rules();

        foreach ($rules as $attribute => $attributeRules) {
            $value = $this->$attribute;

            foreach ($attributeRules as $rule => $ruleData) {
                if ($rule === 'required' && empty($value)) {
                    $errors[$attribute] = $ruleData;
                } elseif ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$attribute] = $ruleData;
                } elseif ($rule === 'min' && strlen($value) < $ruleData[0]) {
                    $errors[$attribute] = $ruleData[1];
                } elseif ($rule === 'match' && $value !== $this->{$ruleData[0]}) {
                    $errors[$attribute] = $ruleData[1];
                }
            }
        }

        return $errors;
    }

    // reminder need to work on db integration and creating migration
}
