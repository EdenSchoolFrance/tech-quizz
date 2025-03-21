<?php

namespace App\controllers;

use App\models\ResultManager;
use App\models\QuizManager;


class ResultController
{

    private $rm;
    private $qm;

    public function __construct()
    {
        $this->rm = new ResultManager();
        $this->qm = new QuizManager();
    }

    public function index()
    {
        $userId = $_SESSION['user']->getId();
        $results = $this->rm->getResultsByUser($userId);
        require VIEWS . 'content/resultat.php';
    }

    public function show($id)
    {
        $result = $this->rc->get($id);
        require VIEWS . 'content/resultat.php';
    }

    public function store($id)
    {

        if (isset($_SESSION['result'])) {
            foreach($_SESSION['result'] as $key => $value) {
                $this->rm->storeAnswers($key, $id);
            }
            $score = $this->rm->score($id);
            $_SESSION['score'] = $score;
            $this->rm->storeQuiz($id, $score);
        }
        $quiz = $this->qm->get($id);

        require VIEWS . 'content/quizResult.php';
    }
}