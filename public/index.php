<?php
require_once '../app/models/User.php';


session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

if (isset($_COOKIE['remember']) && !isset($_SESSION['user'])) {
    $user = new App\Models\UserManager();
    $user = $user->getUser($_COOKIE['remember']);
    $_SESSION['user'] = $user;
}

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

if(user('role') == 'admin') {
    $router->get('/quiz/create', 'QuizController@create');
    $router->get('/dashboard', 'AdminController@index');
    $router->post('/quiz/store', 'QuizController@store');
}


if(!auth() || user('role') == 'admin') {

    $router->get('/login', 'AuthController@showLogin');
    $router->get('/register', 'AuthController@showRegister');
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');

}


if(auth())
{

    $router->get('/logout', 'AuthController@logout');
    $router->get('/quiz', 'QuizController@index');
    $router->get('/result', 'ResultController@index');
    $router->get('/quiz/:id', 'QuestionController@show');
}




$router->run();
