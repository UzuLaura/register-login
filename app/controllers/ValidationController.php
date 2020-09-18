<?php

namespace App\Controllers;

class ValidationController
{
    /**
     * @var array of sanitized form values
     */
    protected static $formValues = [];

    /**
     * Validate form values.
     *
     * @param array $request form values
     * @param array $rules validation rules
     * @return array|null - array of validation errors or null
     */
    public static function validate(array $request, array $rules)
    {
        // Set up sanitized form values
        self::sanitize($request);

        foreach ($rules as $inputName => $rulesSet) {

            foreach ($rulesSet as $rule) {

                // Explode validation rule into rule name and extra parameter
                $validator = explode(':', $rule);

                // If extra parameter exists, add it to validation rule parameters list
                if (count($validator) > 1) {
                    $error = self::{$validator[0]}($inputName, self::$formValues[$inputName], $validator[1]);
                } else {
                    $error = self::{$validator[0]}($inputName, self::$formValues[$inputName]);
                }

                // Set error messages array
                if($error) {
                    ErrorsController::set($error);
                };
            }

        }

        return ErrorsController::all();
    }

    /**
     * Sanitize special characters from form input values.
     *
     * @param array $request - form values
     */
    protected static function sanitize(array $request)
    {
        foreach ($request as $field => $value) {
            self::$formValues[$field] = htmlspecialchars($value);
        }
    }

    /**
     * Check if field is not empty
     * and return error message if field is empty.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @return bool|string
     */
    protected static function required(string $field, string $value)
    {
        if (strlen($value) == 0) {
            return $field . ' field is required.';
        }

        return false;
    }

    /**
     * Check if given value is in valid email format
     * and return error message if otherwise.
     *
     * @param $field - name of field
     * @param $value - field value
     * @return bool|string
     */
    protected static function email(string $field, string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return $field . ' must be a valid email address.';
        }

        return false;
    }

    /**
     * Check if given value is equal or longer than minimum
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @param string $min - minimum value
     * @return bool|string
     */
    protected static function min(string $field, string $value, string $min)
    {
        if ((strlen($value) < $min)) {
            return $field . ' field must be at least ' . $min . ' symbols length.';
        }

        return false;
    }

    /**
     * Check if given value is equal or shorter than maximum
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @param string $max - maximum value
     * @return bool|string
     */
    protected static function max(string $field, string $value, string $max)
    {
        if ((strlen($value) > $max)) {
            return $field . ' field cannot be longer than ' . $max . ' symbols.';
        }

        return false;
    }

    /**
     * Check if given value has at least one upper case letter
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @return bool|string
     */
    protected static function hasUpperCase(string $field, string $value)
    {
        if (strtolower($value) === $value) {
            return $field . ' must contain at least one uppercase letter.';
        }

        return false;
    }

    /**
     * Check if given field value has at least one number
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @return bool|string
     */
    protected static function hasNumber(string $field, string $value)
    {
        $result = false;

        foreach (str_split($value) as $symbol) {
            if (is_numeric($symbol)) {
                $result = true;
            }
        }

        if (!$result) {
            return $field . ' must contain at least one number.';
        }

        return false;
    }

    /**
     * Check if given field value is numeric
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @return bool|string
     */
    protected static function number(string $field, string $value)
    {
        if(!is_numeric($value))
        {
            return $field . ' must be a valid phone number.';
        }

        return false;
    }

    /**
     * Check if fields values match
     * and return error message if otherwise.
     *
     * @param string $field - name of field
     * @param string $value  - field value
     * @param string $matchingField - name of matching field
     * @return bool|string
     */
    protected static function match(string $field, string $value, string $matchingField)
    {
        if ($value !== self::$formValues[$matchingField]) {
            return $matchingField . ' and ' . $field . ' must match.';
        }

        return false;
    }

    /**
     * Check if given field value isn't registered in database
     *
     *
     * @param string $field - name of field
     * @param string $value - field value
     * @param string $model - model name
     * @return bool|string
     */
    protected static function unique(string $field, string $value, string $model)
    {
        $model = ucfirst($model);
        $modelClass = "App\Models\\$model";

        if ($value) {
            $existingValue = $modelClass::where([$field => $value]);

            if ($existingValue) {
                if($existingValue[0]->$field === $value) {
                    return $field . ' with this value already exist.';
                }

            };
        }

        return false;
    }

}