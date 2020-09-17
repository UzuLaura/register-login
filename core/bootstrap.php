<?php

use App\Core\App;
use App\Models\User;

// Set config array into app array
App::bind('config', require 'config.php');

// Make database connection
$pdo = Connection::make(App::get('config')['database']);

// Set database access into app array
App::bind('database', new QueryBuilder($pdo));

// Get helpers functions
require_once 'helpers.php';

session_start();