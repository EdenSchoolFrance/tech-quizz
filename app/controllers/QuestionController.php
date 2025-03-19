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
        $questions = $this->qc->getAll($id);
        foreach ($questions as $question) {
            $question->setAnswers($this->qc->getAnswers($question->getId()));
        }
        require VIEWS . 'content/AffichageQuestion.php';
    }

}