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

    public function getQuestionId()
    {
        return $this->question_id;
    }

    public function getAnswerText()
    {
        return $this->answer_text;
    }

    public function getIsCorrect()
    {
        return $this->is_correct;
    }
}