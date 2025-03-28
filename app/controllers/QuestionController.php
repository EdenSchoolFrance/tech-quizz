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
    private $validator;

    public function __construct()
    {
        $this->qc = new QuestionManager();
        $this->am = new AnswersManager();
        $this->qm = new QuizManager();
        $this->validator = new Validator();
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
        
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }

        $_SESSION['old'] = $_POST;
        
        $this->validator->validate([
            'question_text' => ['required', 'max:255']
        ]);
        
        if ($this->validator->errors()) {
            $_SESSION['error'] = "Please fill all required fields";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        if (!isset($_POST['answers']) || count($_POST['answers']) < 2) {
            $_SESSION['error'] = "Please provide at least 2 answers";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        if (!isset($_POST['correct_answers']) || empty($_POST['correct_answers'])) {
            $_SESSION['error'] = "Please select at least one correct answer";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $questionText = htmlspecialchars($_POST['question_text']);
        $correctAnswers = $_POST['correct_answers'];
        
        $questionId = $this->qc->create($quizId, $questionText);
        
        if (!$questionId) {
            $_SESSION['error'] = "Error creating question";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $success = true;
        foreach ($_POST['answers'] as $index => $answer) {
            $answerText = htmlspecialchars($answer['text']);
            $isCorrect = in_array($index, $correctAnswers) ? 1 : 0;
            
            $result = $this->am->create($questionId, $answerText, $isCorrect);
            if (!$result) {
                $success = false;
            }
        }
        
        if ($success) {
            $_SESSION['success'] = "Question and answers created successfully";
        } else {
            $_SESSION['error'] = "Error creating answers";
        }
        
        header('Location: /quiz/' . $quizId . '/questions');
        exit();
    }
    
    public function deleteQuestion($quizId, $questionId)
    {
        
        
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
    
    public function editQuestion($quizId, $questionId)
    {
        
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }
        
        $question = $this->qc->get($questionId);
        
        if (!$question) {
            $_SESSION['error'] = "Question not found";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $answers = $this->am->get($questionId);
        $question->setAnswers($answers);
        
        require VIEWS . 'content/admin/edit-question.php';
    }
    
    public function updateQuestion($quizId, $questionId)
    {
        
        
        $quiz = $this->qm->get($quizId);
        
        if (!$quiz) {
            $_SESSION['error'] = "Quiz not found";
            header('Location: /dashboard');
            exit();
        }

        $_SESSION['old'] = $_POST;
        
        $question = $this->qc->get($questionId);
        
        if (!$question) {
            $_SESSION['error'] = "Question not found";
            header('Location: /quiz/' . $quizId . '/questions');
            exit();
        }
        
        $this->validator->validate([
            'question_text' => ['required', 'max:255']
        ]);
        
        if ($this->validator->errors()) {
            $_SESSION['error'] = "Please fill all required fields";
            header('Location: /quiz/' . $quizId . '/questions/edit/' . $questionId);
            exit();
        }
        
        if (!isset($_POST['answers']) || count($_POST['answers']) < 2) {
            $_SESSION['error'] = "Please provide at least 2 answers";
            header('Location: /quiz/' . $quizId . '/questions/edit/' . $questionId);
            exit();
        }
        
        if (!isset($_POST['correct_answers']) || empty($_POST['correct_answers'])) {
            $_SESSION['error'] = "Please select at least one correct answer";
            header('Location: /quiz/' . $quizId . '/questions/edit/' . $questionId);
            exit();
        }
        
        $questionText = htmlspecialchars($_POST['question_text']);
        $correctAnswers = $_POST['correct_answers'];
        
        $result = $this->qc->update($questionId, $questionText);
        
        if (!$result) {
            $_SESSION['error'] = "Error updating question";
            header('Location: /quiz/' . $quizId . '/questions/edit/' . $questionId);
            exit();
        }
        
        // Delete existing answers
        $this->am->deleteByQuestionId($questionId);
        
        // Add new answers
        $success = true;
        foreach ($_POST['answers'] as $index => $answer) {
            $answerText = htmlspecialchars($answer['text']);
            $isCorrect = in_array($index, $correctAnswers) ? 1 : 0;
            
            $result = $this->am->create($questionId, $answerText, $isCorrect);
            if (!$result) {
                $success = false;
            }
        }
        
        if ($success) {
            $_SESSION['success'] = "Question and answers updated successfully";
            header('Location: /quiz/' . $quizId . '/questions');
        } else {
            $_SESSION['error'] = "Error updating answers";
            header('Location: /quiz/' . $quizId . '/questions/edit/' . $questionId);
        }
        exit();
    }
}
