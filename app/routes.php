<?php

$router->get('', 'App\Controllers\PagesController@home');

$router->get('login', 'App\Controllers\PagesController@login');
$router->post('login', 'App\Controllers\LoginController@login');

$router->get('register', 'App\Controllers\PagesController@register');
$router->post('register', 'App\Controllers\RegistrationController@register');

$router->get('logout', 'App\Controllers\LoginController@logout');