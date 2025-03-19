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
    
    public function delete($id)
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You need to be connected !";
            header('Location: /login');
            exit();
        }
        
        $quiz = $this->qc->get($id);
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        if (user('role') !== 'admin' && $quiz->getCreatedBy() !== $_SESSION['user']->getId()) {
            $_SESSION['error'] = "You don't have permission";
            header('Location: /dashboard');
            exit();
        }
        
        $result = $this->qc->delete($id);
        
        if ($result) {
            $_SESSION['success'] = "Quiz deleted successfully";
        } else {
            $_SESSION['error'] = "Error deleting quiz";
        }
        
        header('Location: /dashboard');
        exit();
    }
    
    public function dashboard()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You need to be connected !";
            header('Location: /login');
            exit();
        }
        
        $userId = $_SESSION['user']->getId();
        $quizzes = $this->qc->getQuizzesByUser($userId);
        
        require VIEWS . 'content/admin/index.php';
    }
}