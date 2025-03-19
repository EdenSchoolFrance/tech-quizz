<?php

class Results
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


    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt()
    {
        $this->created_at = $created_at;
        return $this;
    }



}

