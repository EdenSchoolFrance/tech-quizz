<?php

class Answers
{
    private $id;
    private $question_id;
    private $answer_text;
    private $is_correct;

    public function getId()
    {
        return $this->id;
    }

    public function setId()
    {
        $this->id = $id;
        return $this;
    }

    public function getQuestionId()
    {
        return $this->question_id;
    }

    public function setQuestionId()
    {
        $this->question_id = $question_id;
        return $this;
    }

    public function getAnswerText()
    {
        return $this->answer_text;
    }

    public function setAnswerText()
    {
        $this->answer_id = $answer_id;
        return $this;
    }

    public function getIsCorrect()
    {
        return $this->is_correct;
    }

    public function setIsCorrect()
    {
        $this->is_correct = $is_correct;
        return $this;
    }
}