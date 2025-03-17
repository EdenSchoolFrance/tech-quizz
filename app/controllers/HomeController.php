<?php

namespace App\controllers;

class HomeController
{
    public function index()
    {
        require VIEWS . 'content/homepage.php';
    }
}