<?php

session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');



$router->run();
