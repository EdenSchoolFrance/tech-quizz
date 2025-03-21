<?php

namespace App\models;

class ResultManager extends Model
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

    public function getResultsByUser($userId)
    {
        $stmt = 'SELECT * FROM user_quizz WHERE user_id = :userId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':userId' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        return $req->fetchAll();
    }

}