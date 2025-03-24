<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Quizzes;
use App\Models\Responses;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quizzes::all();
        return view('quizz.display', [
            'quizzes' => $quizzes,
        ]);
    }

    public function showQuestions($idQuiz, $idQuestion)
    {
        $quizz = Quizzes::query()->findOrFail($idQuiz);

        $questions = Questions::query()
            ->join("quiz_question", "questions.id", "=", "quiz_question.question_id")
            ->where("quiz_question.quiz_id", $idQuiz)
            ->where("quiz_question.order", $idQuestion)
            ->get();

        $responses = Responses::query()
            ->select("responses.response_text", "responses.id", "responses.order")
            ->join("questions", "responses.question_id", "=", "questions.id")
            ->join("quiz_question", "questions.id", "=", "quiz_question.question_id")
            ->where("quiz_question.quiz_id", $idQuiz)
            ->where("quiz_question.order", $idQuestion)
            ->get();

        return view('quizz.questions', [
            'question' => $questions,
            'quizz' => $quizz,
            'responses' => $responses,
        ]);
    }
}
