<?php

namespace App\controllers;

use App\Validator;
use App\models\UserManager;


class AuthController
{
    private $validator;
    private $um;


    public function __construct()
    {
        $this->validator = new Validator();
        $this->um = new UserManager();
    }


    public function showRegister()
    {
        require VIEWS . 'auth/register.php';
    }

    public function showLogin()
    {
        require VIEWS . 'auth/login.php';
    }

    public function logout()
    {
        session_destroy();
        setcookie('remember', '', time() - 3600);
        header('Location: /');
    }

    public function remember($email)
    {
        setcookie('remember', $email, time() + 3600 * 24 * 30);
    }

    public function setUser($email)
    {
        $_SESSION['user'] = $this->um->getUser($email);
    }

    public function login()
    {
        $this->validator->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $_SESSION['old'] = $_POST;

        if ($this->validator->errors()) {
            header('Location: /login');
            exit();
        }

        $user = $this->um->getUser($_POST['email']);

        if ($user && password_verify($_POST['password'], $user->getPasswordHash())) {
            if (isset($_POST['remember'])) {
                $this->remember($_POST['email']);
            }
            $this->setUser($_POST['email']);
            header('Location: /');
            exit();
        }

        header('Location: /login');
    }

    public function register()
    {
        if ($this->um->getUser($_POST['email'])) {
            $_SESSION['errors']['email'] = 'Email already exists';
            header('Location: /register');
            exit();
        }


        $this->validator->validate([
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        $_SESSION['old'] = $_POST;

        if ($this->validator->errors() || $_POST['password'] !== $_POST['password_confirmation']) {
            if ($_POST['password'] !== $_POST['password_confirmation']) {
                $_SESSION['error']['password_confirmation'] = 'Les mots de passe ne correspondent pas';
            }
            header('Location: /register');
            exit();
        }

        $this->um->insertUser($_POST['username'], $_POST['email'], $_POST['password']);

        $this->setUser($_POST['email']);

        header('Location: /');
    }


}