<?php
require_once '../app/models/User.php';

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

use App\Router;

session_start();

$router = new Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

if(user('role') == 'admin') {
    $router->get('/quiz/create', 'QuizController@create');
    $router->get('/dashboard', 'QuizController@dashboard');
    $router->post('/quiz/store', 'QuizController@store');
    $router->post('/quiz/delete/:id', 'QuizController@delete');
}


if(!auth() || user('role') == 'admin') {

    $router->get('/login', 'AuthController@showLogin');
    $router->post('/login', 'AuthController@login');
    $router->get('/register', 'AuthController@showRegister');
    $router->post('/register', 'AuthController@register');
    
}


if(auth())
{
    $router->get('/logout', 'AuthController@logout');
    $router->get('/quiz', 'QuizController@index');
    $router->get('/result', 'ResultController@index');
    $router->get('/quiz/:id', 'QuestionController@show');
}



$router->run();
