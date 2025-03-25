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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getQuizzId()
    {
        return $this->quizz_id;
    }

    public function setQuizzId($quizz_id)
    {
        $this->quizz_id = $quizz_id;
        return $this;
    }

    public function getQuestionText()
    {
        return $this->question_text;
    }

    public function setQuestionText($question_text)
    {
        $this->question_text = $question_text;
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

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

}
