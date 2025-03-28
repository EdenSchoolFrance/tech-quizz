<?php

namespace App\controllers;

use App\models\AnswersManager;

/**
 * Controller handling answers related actions
 */
class AnswersController
{
    private $ac;

    /**
     * Initialize AnswersManager
     */
    public function __construct()
    {
        $this->ac = new QuestionManager(); 
    }

    /**
     * Display all answers
     * 
     * @return void
     */
    public function index()
    {
        $answers = $this->ac->getAll();
        require VIEWS . 'content/AffichageQuestion.php';
    }

    /**
     * Display a specific answer
     * 
     * @param int $id Answer ID
     * @return void
     */
    public function show($id)
    {
        $answer = $this->ac->get($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }
}
