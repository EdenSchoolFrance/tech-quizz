<?php

namespace App\controllers;

use App\models\QuestionManager;
use App\Validator;

class QuestionController
{
    private $qc;

    public function __construct()
    {
        $this->qc = new QuestionManager();
    }

    public function index()
    {
        $questions = $this->qc->getAll();
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $questions = $this->qc->getall($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

}