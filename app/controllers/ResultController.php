<?php

namespace App\controllers;

use App\models\ResultManager;
use App\models\QuizManager;

/**
 * Controller for handling quiz results.
 */
class ResultController
{
    private $rm;
    private $qm;

    /**
     * Constructor to initialize the ResultManager and QuizManager.
     */
    public function __construct()
    {
        $this->rm = new ResultManager();
        $this->qm = new QuizManager();
    }

    /**
     * Display the results of the logged-in user.
     */
    public function index()
    {
        $userId = $_SESSION['user']->getId();
        $results = $this->rm->getResultsByUser($userId);
        require VIEWS . 'content/resultat.php';
    }

    /**
     * Show a specific result by its ID.
     * 
     * @param int $id The result ID.
     */
    public function show($id)
    {
        $result = $this->rc->get($id);
        require VIEWS . 'content/resultat.php';
    }

    /**
     * Store the result after a quiz attempt.
     * 
     * @param int $id The quiz ID.
     * @param int $tryId The attempt ID.
     */
    public function store($id, $tryId)
    {
        if (isset($_SESSION['result'])) {
            // Get the score and store it
            $score = $this->rm->score($id, $tryId);
            $_SESSION['score'] = $score;
            $this->rm->storeQuiz($id, $score, $tryId);
        }

        // Get the quiz data
        $quiz = $this->qm->get($id);

        // Show the quiz result view
        require VIEWS . 'content/quizResult.php';
    }
}
