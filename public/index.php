<?php

session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

$router->get('/login', 'AuthController@showLogin');
$router->get('/register', 'AuthController@showRegister');
$router->get('/quizz', 'QuizController@index');
$router->get('/result', 'ResultController@index');
$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');






$router->run();
