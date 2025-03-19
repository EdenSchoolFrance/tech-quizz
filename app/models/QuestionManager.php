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

    public function getAll($id)
    {
        $stmt = 'SELECT * FROM questions, userquizz WHERE questions.id = userquizz.question_id AND userquizz.user_id = :id';
        $req = $this->getDatabase()->prepare($stmt);
        $req->execute(['id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Chambre::class);

        return $req->fetch();
    }

    public function get($id)
    {
        $req = $this->pdo->query('SELECT * FROM answers WHERE question_id = :id');
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        return $req->fetchAll();
    }


}