<?php

return [
    'database' => [
        'name' => 'login-register',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // error handling mode (for development only)
        ]
    ]
];