<?php

namespace App\models;

class QuizManager 
{
    public function getAll()
    {
        $req = $this->getDatabase()->query('SELECT * FROM quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Chambre::class);

        return $req->fetchAll();
    }


}