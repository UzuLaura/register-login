<?php

namespace App\Controllers;

class ErrorsController
{
    protected static $errors = [];

    public static function set($error)
    {
        self::$errors[] = ucfirst($error);
    }

    public static function any()
    {
        return count(self::$errors) > 0;
    }

    public static function all()
    {
        if (self::any()) {
            return self::$errors;
        }

        return null;
    }
}