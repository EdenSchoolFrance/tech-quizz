<?php

namespace App\models;

class AdminResult
{
    private $id;
    private $user_id;
    private $quizz_id;
    private $score;
    private $completed_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id = $id;
        return $this;
    }

    public function getQuizzId()
    {
        return $this->quizz_id;
    }

    public function setQuizzId()
    {
        $this->quizz_id = $quizz_id;
        return $this;
    }


    public function getScore()
    {
        return $this->score;
    }

    public function setScore()
    {
        $this->score = $score;
        return $this;
    }


    public function getCreatedAt()
    {
        return $this->completed_at;
    }

    public function setCreatedAt()
    {
        $this->completed_at = $completed_at;
        return $this;
    }



}

