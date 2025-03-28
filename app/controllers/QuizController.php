<?php

namespace App\controllers;

use App\models\QuizManager;
use App\Validator;

/**
 * Controller managing quiz actions such as viewing, creating, updating, and deleting quizzes.
 */
class QuizController
{
    private $qc;
    private $validator;

    /**
     * Initialize QuizManager and Validator
     */
    public function __construct()
    {
        $this->qc = new QuizManager();
        $this->validator = new Validator();
    }

    /**
     * Display all quizzes
     * 
     * @return void
     */
    public function index()
    {
        $quizz = $this->qc->getAll();
        require VIEWS . 'content/quiz.php';
    }

    /**
     * Display a specific quiz by its ID
     * 
     * @param int $id Quiz ID
     * @return void
     */
    public function show($id)
    {
        $quiz = $this->qc->get($id);
        require VIEWS . 'content/quiz.php';
    }

    /**
     * Display the form to create a new quiz (only accessible by admin)
     * 
     * @return void
     */
    public function create()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'admin') {
            $_SESSION['error'] = "You don't have permission to access this page";
            header('Location: /');
            exit();
        }
        
        require VIEWS . 'content/admin/create-quiz.php';
    }

    /**
     * Handle the submission of the quiz creation form
     * 
     * @return void
     */
    public function store()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You need to be connected !";
            header('Location: /login');
            exit();
        }

        $this->validator->validate([
            'title' => ['required', 'max:255']
        ]);
        
        if ($this->validator->errors()) {
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
            header('Location: /dashboard');
            exit();
        } else {
            $_SESSION['error'] = "Error";
            $_SESSION['old'] = $_POST;
            header('Location: /quiz/create');
            exit();
        }
    }

    /**
     * Delete a quiz by its ID (only accessible by admin or the creator)
     * 
     * @param int $id Quiz ID
     * @return void
     */
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

    /**
     * Display the form to edit a quiz from the dashboard (only accessible by admin or the creator)
     * 
     * @param int $id Quiz ID
     * @return void
     */
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

    /**
     * Handle the submission of the quiz edit form from the dashboard
     * 
     * @param int $id Quiz ID
     * @return void
     */
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

        $this->validator->validate([
            'title' => ['required', 'max:255']
        ]);
        
        if ($this->validator->errors()) {
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
