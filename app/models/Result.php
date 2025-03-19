<?php

namespace App\models;

class Result
{
    private $id;
    private $title;
    private $score;
    private $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle()
    {
        $this->title = $title;
        return $this;
    }
    
    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}