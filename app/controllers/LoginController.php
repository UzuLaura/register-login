<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{
    public function login()
    {
        $user = User::where("email = \"${_POST['email']}\"");

        if ($user && password_verify($_POST['password'], $user[0]->password)) {

            // Set user data in session
            $_SESSION['user'] = $user[0];

            // Set last login date in db


            return view('home', [
                'user' => $user[0]
            ]);
        };

        return view('login', [
            'error' => 'Access denied. Check if provided login data is correct.'
        ]);
    }

    public function logout()
    {
        unset($_SESSION['user']);

        return view('login');
    }
}