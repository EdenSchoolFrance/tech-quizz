<?php

namespace App\models;

class Question
{
    private $id;
    private $quizz_id;
    private $question_text;
    private $created_at;
    private $answers;

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

    public function getQuestionText()
    {
        return $this->question_text;
    }

    public function setQuestionId()
    {
        $this->question_id = $question_id;
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

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

}



