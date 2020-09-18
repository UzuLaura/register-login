<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{
    /**
     * Login functionality.
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function login()
    {
        $user = User::where("email = \"${_POST['email']}\"");

        if ($user && password_verify($_POST['password'], $user[0]->password)) {

            // Set user data in session
            $_SESSION['user'] = $user[0];

            // Set last login date in DB
            User::update($user[0], [
                'last_login_at' => date("Y-m-d H:i:s"),
            ]);

            return redirect('');
        };

        return view('login', [
            'errors' => ['Access denied. Check if provided login data is correct.']
        ]);
    }

    /**
     * Logout functionality.
     */
    public function logout()
    {
        unset($_SESSION['user']);

        return redirect('login');
    }
}