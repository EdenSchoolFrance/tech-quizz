<?php

namespace App\controllers;

use App\models\QuestionManager;
use App\models\AnswersManager;

class QuestionController
{
    private $qc;
    private $am;

    public function __construct()
    {
        $this->qc = new QuestionManager();
        $this->am = new AnswersManager();
    }

    public function index($id)
    {
        $questions = $this->qc->getAll($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $questions = $this->qc->getAll($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

}