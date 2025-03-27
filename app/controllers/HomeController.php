<?php

namespace App\controllers;

class HomeController
{
    public function index()
    {
        require VIEWS . 'content/homepage.php';
    }

    public function suspended()
    {
        require VIEWS . 'content/suspended.php';
    }
}