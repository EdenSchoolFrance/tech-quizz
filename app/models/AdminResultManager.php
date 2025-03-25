<?php

namespace App\models;

class AdminResultManager extends Model
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
        $req = $this->pdo->query('SELECT * FROM user_quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        return $req->fetchAll();
    }

    public function get($userId)
    {
        $stmt = 'SELECT user_quizz.id, score, title, completed_at FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id = :userId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':userId' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);
    
        return $req->fetchAll();
    }
}