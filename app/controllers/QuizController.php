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
            header('Location: /dashboard');
            exit();
        }
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description'] ?? '');
        $userId = $_SESSION['user']->getId();
        
        $quizId = $this->qc->create($title, $description, $userId);
        
        if ($quizId) {
            $_SESSION['success'] = "Quiz created successfully";
            header('Location: /dashboard');
            exit();
        } else {
            $_SESSION['error'] = "Error";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard');
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

    
    public function editInDashboard($id)
    {
        $quiz = $this->qc->get($id);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        if (user('role') !== 'admin' && $quiz->getCreatedBy() !== user('id')) {
            $_SESSION['error'] = "You don't have permission to edit this quiz";
            header('Location: /dashboard');
            exit();
        }
        
        require VIEWS . 'content/admin/edit-quiz.php';
    }
    
    public function updateInDashboard($id)
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
            $_SESSION['error'] = "You don't have permission to edit this quiz";
            header('Location: /dashboard');
            exit();
        }
        
        $validator = new Validator();
        $validator->validate([
            'title' => ['required', 'max:255']
        ]);
        
        if (!empty($validator->errors())) {
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/quiz/edit/' . $id);
            exit();
        }
        
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description'] ?? '');
        
        $result = $this->qc->update($id, $title, $description);
        
        if ($result) {
            $_SESSION['success'] = "Quiz updated successfully";
            header('Location: /dashboard');
            exit();
        } else {
            $_SESSION['error'] = "Error updating quiz";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/quiz/edit/' . $id);
            exit();
        }
    }
}