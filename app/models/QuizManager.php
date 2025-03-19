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
            die("Error while connecting the database: " . $e->getMessage());
        }
    }

    public function getAll()
    {
        $req = $this->pdo->query('SELECT * FROM quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        return $req->fetchAll();
    }

    public function get($id)
    {
        $req = $this->pdo->prepare('SELECT * FROM quizz WHERE id = :id');
        $req->execute(['id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        return $req->fetch();
    }

    public function create($title, $description, $userId)
    {
        $id = uniqid();
        
        $req = $this->pdo->prepare('INSERT INTO quizz (id, title, description, created_by) VALUES (:id, :title, :description, :created_by)');
        
        $result = $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'created_by' => $userId
        ]);
        
        if ($result) {
            return $id;
        }
        
        return false;
    }
}