<?php

namespace App\Controllers;

class ErrorsController
{
    /**
     * @var array of errors strings
     */
    protected static $errors = [];

    /**
     * Add error to errors array.
     *
     * @param string $error
     */
    public static function set(string $error)
    {
        self::$errors[] = ucfirst($error);
    }

    /**
     * Check if any errors exist in errors array.
     *
     * @return bool
     */
    public static function any(): bool
    {
        return count(self::$errors) > 0;
    }

    /**
     * Get errors array.
     *
     * @return array|null
     */
    public static function all()
    {
        if (self::any()) {
            return self::$errors;
        }

        return null;
    }
}