<?php

namespace App\controllers;

use App\models\ResultManager;


class ResultController
{

    private $rm;

    public function __construct()
    {
        $this->rm = new ResultManager();
    }

    public function index()
    {
        $userId = $_SESSION['user']->getId();
        $results = $this->rm->getResultsByUser($userId);
        require VIEWS . 'content/resultat.php';
    }

    public function show($id)
    {
        $result = $this->rc->get($id);
        require VIEWS . 'content/resultat.php';
    }

}