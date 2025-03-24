<?php

namespace App\models;
use App\Validator;

class AnswersManager extends Model
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = $this->getDatabase();
        } catch (\PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public function getAll($id)
    {
        $stmt = 'SELECT * FROM answers WHERE question_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        return $req->fetchAll();
    }

    public function get($id)
    {
        $stmt = 'SELECT * FROM answers WHERE question_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Answers::class);

        return $req->fetchAll();
    }

    public function storeUserAnswer($quiz_id, $user_id, $question_id, $answer_id) {
        $stmt = 'INSERT INTO user_answers (id, user_id, question_id, answer_id) VALUES (:id, :user_id, :question_id, :answer_id)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':user_id' => $user_id, ':question_id' => $question_id, ':answer_id' => $answer_id]);

        header('Location: /quiz/' . $quiz_id . '/' . ($question_id + 1));
    }
    
    public function create($questionId, $answerText, $isCorrect)
    {
        $id = uniqid();
        
        $stmt = 'INSERT INTO answers (id, question_id, answer_text, is_correct) VALUES (:id, :question_id, :answer_text, :is_correct)';
        $req = $this->pdo->prepare($stmt);
        $result = $req->execute([
            ':id' => $id,
            ':question_id' => $questionId,
            ':answer_text' => $answerText,
            ':is_correct' => $isCorrect
        ]);
        
        if ($result) {
            return $id;
        }
        
        return false;
    }
    
    public function delete($id)
    {
        $stmt = 'DELETE FROM answers WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':id' => $id]);
    }
    
    public function deleteByQuestionId($questionId)
    {
        $stmt = 'DELETE FROM answers WHERE question_id = :question_id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':question_id' => $questionId]);
    }
}