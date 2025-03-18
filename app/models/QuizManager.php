<?php

namespace App\models;

class QuizManager extends Model
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
        $req = $this->pdo->query('SELECT * FROM quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        return $req->fetchAll();
    }


}