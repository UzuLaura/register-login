<?php

namespace App\Core;

use Exception;

class App
{
    /**
     * @var array of app data
     */
    protected static $registry = [];

    /**
     * Set key and value in registry array.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function bind(string $key, $value)
    {
        self::$registry[$key] = $value;

    }

    /**
     * Get registry array value by key.
     *
     * @param string $key
     * @return mixed
     *
     * @throws Exception
     */
    public static function get(string $key)
    {
        if(!array_key_exists($key, self::$registry)) {
            throw new Exception("No $key is bound in the container");
        }

        return self::$registry[$key];
    }
}