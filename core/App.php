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
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        self::$registry[$key] = $value;

    }

    /**
     * Get registry array value by key.
     *
     * @param $key
     * @return mixed
     *
     * @throws Exception
     */
    public static function get($key)
    {
        if(!array_key_exists($key, self::$registry)) {
            throw new Exception("No $key is bound in the container");
        }

        return self::$registry[$key];
    }
}