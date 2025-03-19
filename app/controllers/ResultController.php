<?php

namespace App\controllers;

use App\models\ResultManager;


class ResultController
{
    private $rc;

    public function __construct()
    {
        $this->rc = new QuizManager();
    }

    public function index()
    {
        $results = $this->rc->getAll();
        require VIEWS . 'content/result.php';
    }

    public function show($id)
    {
        $result = $this->rc->get($id);
        require VIEWS . 'content/result.php';
    }

}