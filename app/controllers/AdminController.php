<?php

namespace App\controllers;

use App\models\UserManager;

class AdminController 
{
    private $um;

    public function __construct()
    {
        $this->um = new UserManager();
    }

    public function index()
    {
        $users = $this->um->getAllUsers();
        require VIEWS . 'content/admin/index.php';
    }
}