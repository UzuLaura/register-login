<?php

namespace App\Controllers;

use App\Models\User;

class RegistrationController
{
    public function register()
    {
        $validationRules = [
            'name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:user'],
            'phone' => ['number'],
            'password' => ['required', 'min:8', 'max:12', 'hasNumber', 'hasUpperCase'],
            'password_repeat' => ['required', 'match:password']
        ];

        $errors = ValidationController::validate($_POST, $validationRules);

        if (isset($errors)) {
            return view('register', [
                'errors' => $errors,
                'fields' => $_POST
            ]);
        }

        User::create($_POST);

        return(redirect('login'));
    }
}