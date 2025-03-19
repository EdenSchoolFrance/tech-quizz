<?php

namespace App\controllers;

use App\models\ResultManager;


class ResultController
{
    private $rc;

    public function __construct()
    {
        $this->rc = new ResultManager();
    }

    public function index()
    {
        $results = $this->rc->getAll();
        require VIEWS . 'content/resultat.php';
    }

    public function show($id)
    {
        $result = $this->rc->get($id);
        require VIEWS . 'content/resultat.php';
    }

}