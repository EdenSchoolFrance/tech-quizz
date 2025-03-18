<?php

namespace App\controllers;

class AuthController
{
    public function showRegister()
    {
        require VIEWS . 'auth/register.php';
    }

    public function showLogin()
    {
        require VIEWS . 'auth/login.php';
    }
}