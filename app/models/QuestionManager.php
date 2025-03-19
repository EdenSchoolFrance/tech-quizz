<?php

namespace App\models;
use App\Validator;

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
        $stmt = 'SELECT * FROM questions, user_quizz WHERE questions.id = user_quizz.id ';
        $req = $this->getDatabase()->prepare($stmt);
        $req->execute(['id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        return $req->fetch();
    }

    public function get($id)
    {
        $req = $this->pdo->query('SELECT * FROM answers WHERE question_id = :id');
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        return $req->fetchAll();
    }


}