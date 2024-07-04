<?php

require_once '../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router();

// Define routes
$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/users', 'App\Controllers\UserController@index');
$router->get('/users/create', 'App\Controllers\UserController@create');
$router->post('/users/store', 'App\Controllers\UserController@store');
$router->get('/users/edit/(\d+)', 'App\Controllers\UserController@edit');
$router->post('/users/update/(\d+)', 'App\Controllers\UserController@update');
$router->get('/users/delete/(\d+)', 'App\Controllers\UserController@delete');

$router->run();
