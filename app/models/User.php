<?php

namespace App\Models;

use App\Core\App;

class User
{
    /**
     * Insert new user in DB.
     *
     * @param array $user - user data
     *
     * @throws \Exception
     */
    public static function create($user)
    {
        App::get('database')->insert('users', [
            'name' => $user['name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'password' => password_hash($user['password'], PASSWORD_DEFAULT),
            'registered_at' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * Get single user data from DB.
     *
     * @param int|string $condition
     * @return mixed
     *
     * @throws \Exception
     */
    public static function get($condition = 1)
    {
        return App::get('database')->get('users', $condition);
    }

    /**
     * Get single user data from DB
     * where user data meets condition.
     *
     * @param string $condition to look for (mysql where condition)
     * @return mixed
     *
     * @throws \Exception
     */
    public static function where($condition)
    {
        return self::get($condition);
    }
}