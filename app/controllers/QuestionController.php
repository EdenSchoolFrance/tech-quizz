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

    public function show($quizId)
    {
        $questions = $this->qc->getAll($quizId);
        foreach ($questions as $question) {
            $question->answers = $this->qc->getAnswers($question->getId());
        }
        require VIEWS . 'content/AffichageQuestion.php';
    }

}