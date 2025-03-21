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

    public function show($id, $limit)
    {
        if ($limit == 1) {
            $_SESSION['quiz_token'] = 'ok';
        }

        if (!isset($_SESSION['quiz_token'])) {
            header('Location: /quiz/' . $id . '/1');
            exit();
        }

        if($limit > 1) {
            $this->am->storeUserAnswer($id, user('id'), $limit, $_GET['answer']);
        }
        require VIEWS . 'content/AffichageQuestion.php';
    }

}