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
    public function validatee(): array
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


    /**
     * Save the user data into the database
     * 
     * @return bool
     */
   /*  public function save(): bool
    {
        $db = \app\core\Database::getInstance();

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    } */
}
