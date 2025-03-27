<?php

namespace App\models;

class QuestionManager extends Model
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
        $stmt = 'SELECT * FROM questions WHERE quizz_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        return $req->fetchAll();
    }

    public function getAnswers($questionId)
    {
        $stmt = 'SELECT * FROM answers WHERE question_id = :questionId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':questionId' => $questionId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Answers::class);

        return $req->fetchAll();
    }

    public function create($quizzId, $questionText)
    {
        $id = uniqid();
        
        $stmt = 'INSERT INTO questions (id, quizz_id, question_text) VALUES (:id, :quizz_id, :question_text)';
        $req = $this->pdo->prepare($stmt);
        $result = $req->execute([
            ':id' => $id,
            ':quizz_id' => $quizzId,
            ':question_text' => $questionText
        ]);
        
        if ($result) {
            return $id;
        }
        
        return false;
    }
    
    public function delete($id)
    {
        $stmt = 'DELETE FROM questions WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':id' => $id]);
    }
    
    public function get($id)
    {
        $stmt = 'SELECT * FROM questions WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        return $req->fetch();
    }
    
    public function update($id, $questionText)
    {
        $stmt = 'UPDATE questions SET question_text = :question_text WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([
            ':id' => $id,
            ':question_text' => $questionText
        ]);
    }
}