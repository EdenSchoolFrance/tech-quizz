<?php

namespace App\controllers;

use App\Validator;
use App\models\UserManager;

/**
 * Controller handling authentication (login, register, logout)
 */
class AuthController
{
    private $validator;
    private $um;

    /**
     * Initialize Validator and UserManager
     */
    public function __construct()
    {
        $this->validator = new Validator();
        $this->um = new UserManager();
    }

    /**
     * Display the registration form
     * 
     * @return void
     */
    public function showRegister()
    {
        require VIEWS . 'auth/register.php';
    }

    /**
     * Display the login form
     * 
     * @return void
     */
    public function showLogin()
    {
        require VIEWS . 'auth/login.php';
    }

    /**
     * Logout the user and destroy the session
     * 
     * @return void
     */
    public function logout()
    {
        session_destroy();
        setcookie('remember', '', time() - 3600);
        header('Location: /');
    }

    /**
     * Remember the user by storing email in a cookie
     * 
     * @param string $email User email
     * @return void
     */
    public function remember($email)
    {
        setcookie('remember', $email, time() + 3600 * 24 * 30);
    }

    /**
     * Set the user in the session
     * 
     * @param string $email User email
     * @return void
     */
    public function setUser($email)
    {
        $_SESSION['user'] = $this->um->getUser($email);
    }

    /**
     * Process the login form
     * 
     * @return void
     */
    public function login()
    {
        $this->validator->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
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

        $_SESSION['error']['password'] = 'L\'email ou le mot de passe est incorrect.';
        header('Location: /login');
    }

    /**
     * Process the registration form
     * 
     * @return void
     */
    public function register()
    {
        $_SESSION['old'] = $_POST;

        if ($this->um->getUser($_POST['email'])) {
            $_SESSION['error']['email'] = 'L\'email est déjà utilisé';
            header('Location: /register');
            exit();
        }

        $this->validator->validate([
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:50', 'majuscule', 'minuscule', 'specialChars']
        ]);

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
