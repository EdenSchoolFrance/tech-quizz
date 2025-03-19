<?php

namespace App\controllers;

use App\models\QuizManager;
use App\Validator;

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

    public function create()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You need to be connected !";
            header('Location: /login');
            exit();
        }
        
        require VIEWS . 'content/createquiz.php';
    }

    public function store()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You need to be connected !";
            header('Location: /login');
            exit();
        }
        
        $validator = new Validator();
        $validator->validate([
            'title' => ['required', 'max:255']
        ]);
        
        if (!empty($validator->errors())) {
            $_SESSION['old'] = $_POST;
            header('Location: /quiz/create');
            exit();
        }
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description'] ?? '');
        $userId = $_SESSION['user']->getId();
        
        $quizId = $this->qc->create($title, $description, $userId);
        
        if ($quizId) {
            $_SESSION['success'] = "Quiz created successfully";
            header('Location: /quiz/' . $quizId);
            exit();
        } else {
            $_SESSION['error'] = "Error";
            $_SESSION['old'] = $_POST;
            header('Location: /quiz/create');
            exit();
        }
    }
}