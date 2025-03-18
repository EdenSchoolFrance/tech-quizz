<?php

class Question
{
    private $id;
    private $quizz_id;
    private $question_text;
    private $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function getQuizzId()
    {
        return $this->quizz_id;
    }

    public function getQuestionText()
    {
        return $this->question_text;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}