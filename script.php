<?php

declare(strict_types=1);

// Load classes (via composer)
require 'vendor/autoload.php';

// Load bootstrap
require 'core/bootstrap.php';

use App\Core\Database\Migrations\CreateUsersTable;

/**
 * Run database migration.
 */
function migrate()
{
    $migration = new CreateUsersTable();
    $migration->create();
}

// Call function that was inserted in terminal
if (function_exists($argv[1])) {
    $argv[1]();
} else {
    echo 'Function \'' . $argv[1] . '\' doesn\'t exist';
}