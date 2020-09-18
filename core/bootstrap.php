<?php

use App\Core\App;
use App\Models\User;


// Set config array into app array
App::bind('config', require 'config.php');

// Make database connection
$connection = Connection::make(App::get('config')['database']);

// Set database access into app array
App::bind('database', new QueryBuilder($connection));

// Get helpers functions
require_once 'helpers.php';

// Start session
session_start();