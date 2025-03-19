<?php

namespace App\controllers;

use App\models\QuestionManager;

class QuestionController
{
    private $qc;

    public function __construct()
    {
        $this->qc = new QuestionManager();
    }

    public function index()
    {
        $answers = $this->qc->getAll();
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $answer = $this->qc->get($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }


    // public function __construct()
    // {
    //     $this->qc = new QuestionManager();
    // }

    // public function index()
    // {
    //     $answers = $this->qc->getAll();
    //     require VIEWS . 'content/answer.php';
    // }

    // public function show($id)
    // {
    //     $answer = $this->qc->get($id);
    //     require VIEWS . 'content/answer.php';
    // }

}