<?php

namespace App\models;

class AdminResult
{
    private $id;
    private $try_id;
    private $user_id;
    private $quizz_id;
    private $score;
    private $completed_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTryId()
    {
        return $this->try_id;
    }

    public function setTryId($try_id)
    {
        $this->try_id = $try_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getQuizzId()
    {
        return $this->quizz_id;
    }

    public function setQuizzId($quizz_id)
    {
        $this->quizz_id = $quizz_id;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getCompletedAt()
    {
        return $this->completed_at;
    }

    public function setCompletedAt($completed_at)
    {
        $this->completed_at = $completed_at;
    }


}

