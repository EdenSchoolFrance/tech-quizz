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

    public function getAll()
    {
        $req = $this->pdo->query('SELECT * FROM user_quizz, quizz WHERE user_quizz.quizz_id = quizz.id');
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        return $req->fetchAll();
    }


}