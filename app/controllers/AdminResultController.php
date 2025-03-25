<?php

namespace App\controllers;

use App\models\AdminResultManager;


class AdminResultController
{
    private $arc;

    public function __construct()
    {
        $this->arc = new AdminResultManager();
    }

    public function index()
    {
        $userId = $_SESSION['user']->getId();
        $results = $this->arc->getResultsByUser($userId);
        require VIEWS . 'content/admin/result.php';
    }

    public function show($id)
    {
        $userResults = $this->arc->get($id);
        require VIEWS . 'content/admin/result.php';
    }

}