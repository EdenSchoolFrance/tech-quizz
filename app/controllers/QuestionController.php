<?php

namespace App\controllers;

use App\models\QuestionManager;
use App\models\AnswersManager;
use App\models\QuizManager;
use App\Validator;

class QuestionController
{
    private $qc;
    private $am;
    private $qm;

    public function __construct()
    {
        $this->qc = new QuestionManager();
        $this->am = new AnswersManager();
        $this->qm = new QuizManager();
    }

    public function index($id)
    {
        $questions = $this->qc->getAll($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function show($id)
    {
        $questions = $this->qc->getAll($id);
        require VIEWS . 'content/AffichageQuestion.php';
    }

    public function manageQuestions($quizId)
    {
        if (!isset($_SESSION['user']) || user('role') !== 'admin') {
            $_SESSION['error'] = "You need to be an admin!";
            header('Location: /login');
            exit();
        }
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        $questions = $this->qc->getAll($quizId);
        
        foreach ($questions as $question) {
            $answers = $this->am->get($question->getId());
            $question->setAnswers($answers);
        }
        
        require VIEWS . 'content/admin/question.php';
    }
    
    public function storeQuestion($quizId)
    {
        if (!isset($_SESSION['user']) || user('role') !== 'admin') {
            $_SESSION['error'] = "You need to be an admin!";
            header('Location: /login');
            exit();
        }
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        $validator = new Validator();
        $validator->validate([
            'question_text' => ['required'],
            'correct_answer' => ['required']
        ]);
        
        if (!empty($validator->errors())) {
            $_SESSION['error'] = "Please fill all required fields";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        if (!isset($_POST['answers']) || count($_POST['answers']) !== 4) {
            $_SESSION['error'] = "Please provide exactly 4 answers";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $questionText = htmlspecialchars($_POST['question_text']);
        $correctAnswerIndex = (int) $_POST['correct_answer'];
        
        $questionId = $this->qc->create($quizId, $questionText);
        
        if (!$questionId) {
            $_SESSION['error'] = "Error creating question";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $success = true;
        foreach ($_POST['answers'] as $index => $answer) {
            $answerText = htmlspecialchars($answer['text']);
            $isCorrect = ($index == $correctAnswerIndex) ? 1 : 0;
            
            $result = $this->am->create($questionId, $answerText, $isCorrect);
            if (!$result) {
                $success = false;
            }
        }
        
        if ($success) {
            $_SESSION['success'] = "Question and answers added successfully";
        } else {
            $_SESSION['error'] = "Error adding answers";
        }
        
        header('Location: /quiz/' . $quizId . '/questions');
        exit();
    }
    
    public function deleteQuestion($quizId, $questionId)
    {
        if (!isset($_SESSION['user']) || user('role') !== 'admin') {
            $_SESSION['error'] = "You need to be an admin!";
            header('Location: /login');
            exit();
        }
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        $result = $this->qc->delete($questionId);
        
        if ($result) {
            $_SESSION['success'] = "Question deleted successfully";
        } else {
            $_SESSION['error'] = "Error deleting question";
        }
        
        header('Location: /quiz/' . $quizId . '/questions');
        exit();
    }
}
