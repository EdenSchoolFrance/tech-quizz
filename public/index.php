<?php
require_once '../app/models/User.php';

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

use App\Router;
use App\Models\UserManager;

session_start();

if (strpos($_SERVER['REQUEST_URI'], '/fetch.php') ) {
    require API . 'fetch.php';
    exit;
}

if (isset($_COOKIE['remember']) || isset($_SESSION['user'])) {
    $user = new UserManager();
    $user = $user->getUser($_COOKIE['remember'] ?? user('email'));
    $_SESSION['user'] = $user;
}

$router = new Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

if(user('role') == 'admin') {
    $router->get('/dashboard', 'QuizController@adminDashboard');
    $router->post('/quiz/store', 'QuizController@store');
    $router->post('/quiz/delete/:id', 'QuizController@delete');
    $router->get('/dashboard/quiz/edit/:id', 'QuizController@editInDashboard');
    $router->post('/dashboard/quiz/update/:id', 'QuizController@updateInDashboard');
    $router->get('/dashboard/user/edit/:id', 'AdminController@editUser');
    $router->post('/dashboard/user/update/:id', 'AdminController@updateUser');
    $router->post('/dashboard/user/delete/:id', 'AdminController@deleteUser');
    $router->get('/dashboard/user/create', 'AdminController@createUser');
    $router->post('/dashboard/user/store', 'AdminController@storeUser');
    $router->get('/content/admin/result/:id', 'AdminResultController@show');
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
    $router->get('/quiz/:id/:limit', 'QuestionController@show');
    $router->get('/result', 'ResultController@index');
}



$router->run();