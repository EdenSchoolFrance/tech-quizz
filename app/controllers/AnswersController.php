<?php

namespace App\controllers;

use App\models\AnswersManager;


class AnswersController
{
    private $ac;

    public function __construct()
    {
        $this->ac = new QuestionManager();
    }

    public function index()
    {
        $answers = $this->ac->getAll();
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $answer = $this->ac->get($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

}