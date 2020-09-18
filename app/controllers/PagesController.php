<?php

namespace App\Controllers;

class PagesController
{
    /**
     * Return home page.
     *
     * @return mixed
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Return login page.
     *
     * @return mixed
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Return registration page.
     *
     * @return mixed
     */
    public function register()
    {
        return view('register');
    }
}