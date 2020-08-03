<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/thanks', 'HomeController@thanks');
$router->get('/show', 'XMLController@show');
$router->post('/handle', 'XMLController@handle');
$router->post('/create-csv', 'XMLController@createCsv');

return $router;
