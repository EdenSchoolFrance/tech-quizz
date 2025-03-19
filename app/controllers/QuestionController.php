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

    public function index($id)
    {
        $questions = $this->qc->getAll($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $questions = $this->qc->get($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

}