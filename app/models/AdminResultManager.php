<?php

namespace App\models;

class ResultsManager extends Model
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
        $req->setFetchMode(\PDO::FETCH_CLASS, Results::class);

        return $req->fetchAll();
    }
}