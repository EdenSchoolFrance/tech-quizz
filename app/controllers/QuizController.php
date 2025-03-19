<?php

namespace App\controllers;

use App\models\QuizManager;


class QuizController
{
    private $qc;

    public function __construct()
    {
        $this->qc = new QuizManager();
    }

    public function index()
    {
        $quizz = $this->qc->getAll();
        require VIEWS . 'content/quiz.php';
    }

    public function show($id)
    {
        $quiz = $this->qc->get($id);
        require VIEWS . 'content/quiz.php';
    }

}