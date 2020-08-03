<?php
session_start();
require '../vendor/autoload.php';
$router = require '../src/routes.php';

$router->run($router->routes);
