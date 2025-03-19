<?php
require_once '../app/models/User.php';


session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

if(!auth() || user('role') == 'admin') {
    $router->get('/login', 'AuthController@showLogin');
    $router->get('/register', 'AuthController@showRegister');
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
}

if(auth()) {
    
    $router->get('/quiz', 'QuizController@index');
    $router->get('/result', 'ResultController@index');
    $router->get('/quiz/:id', 'QuizController@show');
    
}

if(user('role') == 'admin') {
    
    $router->get('/quiz/create', 'QuizController@create');
    $router->post('/quiz/store', 'QuizController@store');

}



$router->run();
