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

    public function getAll()
    {
        $stmt = 'SELECT * FROM questions';
        $req = $this->pdo->prepare($stmt);
        $req->execute();
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


}