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
        $req->setFetchMode(\PDO::FETCH_CLASS, AdminResult::class);

        return $req->fetchAll();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user_quizz WHERE user_id = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, AdminResult::class);
    
        return $stmt->fetchAll();
    }
}