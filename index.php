<?php

declare(strict_types=1);

date_default_timezone_set('Europe/Vilnius');

use App\Core\{Router, Request};

// Load classes (via composer)
require 'vendor/autoload.php';

// Load bootstrap
require 'core/bootstrap.php';

// Load router
Router::load('app/routes.php')->redirect(Request::uri(), Request::method());
