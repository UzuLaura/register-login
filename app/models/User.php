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
    public static function create(array $user)
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
    public static function where(string $condition)
    {
        return self::get($condition);
    }

    /**
     * Update user data in DB.
     *
     * @param object $user - user data retrieved from DB
     * @param array $update - table column name (array index) and new value (array value)
     *
     * @throws \Exception
     */
    public static function update($user, array $update)
    {
        App::get('database')->update('users', $update,
            'user_id = ' . $user->user_id
        );
    }
}