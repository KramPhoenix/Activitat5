<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Rentit\App;
use Rentit\Session;

Session::init();

App::run();