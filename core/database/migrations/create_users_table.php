<?php

namespace App\Core\Database\Migrations;

use App\Core\App;

class CreateUsersTable
{
    /**
     * Set database column names and requirements
     * and create database table.
     *
     * @throws \Exception
     */
    public function create()
    {
        $sql = [
            'user_id' => 'int primary key auto_increment',
            'email' => 'varchar(60) not null unique',
            'name' => 'varchar(60) not null',
            'last_name' => 'varchar(60) not null',
            'phone' => 'varchar(60) not null',
            'password' => 'varchar(255) not null',
            'registered_at' => 'timestamp',
            'last_login_at' => 'timestamp'
        ];

        App::get('database')->createTable('users', $sql);
    }
}