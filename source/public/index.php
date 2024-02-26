<?php
use app\router\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../vendor/autoload.php');


Router::exec();