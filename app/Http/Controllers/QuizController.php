<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Quizzes;
use App\Models\Responses;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quizzes::all();
        return view('quizz.display', [
            'quizzes' => $quizzes,
        ]);
    }

    public function getResponsesAndQuestions($idQuiz, $idOrder)
    {
        $quizz = Quizzes::query()->findOrFail($idQuiz);

        $question = Questions::query()
            ->join("quiz_question", "questions.id", "=", "quiz_question.question_id")
            ->where("quiz_question.quiz_id", $idQuiz)
            ->where("quiz_question.order", $idOrder)
            ->get()
            ->first();

        $responses = Responses::query()
            ->select("responses.response_text", "responses.id", "responses.order")
            ->join("questions", "responses.question_id", "=", "questions.id")
            ->join("quiz_question", "questions.id", "=", "quiz_question.question_id")
            ->where("quiz_question.quiz_id", $idQuiz)
            ->where("quiz_question.order", $idOrder)
            ->get();

        return view('quizz.questions', [
            'question' => $question,
            'quizz' => $quizz,
            'responses' => $responses,
            "idOrder" => $idOrder,
            "idQuiz" => $idQuiz,
        ]);
    }

    public function showQuestions($idQuiz, $idOrder)
    {
        return $this->getResponsesAndQuestions($idQuiz, $idOrder);
    }

    public function chooseAnswer(Request $request)
    {
        $questionId = $request->input("questionId");
        $answerId = $request->input('selectedAnswerId');

        $getAnswer = Responses::query()->find($answerId);
        $correctAnswer = Responses::query()->select("id")->where("is_correct", "=", 1)->where("question_id", "=", $questionId)->get();

        if ($getAnswer->is_correct !== 1) {
            return response()->json(["success" => false, "correctAnswer" => $correctAnswer]);
        }
        return response()->json(["success" => true, "correctAnswer" => $correctAnswer]);
    }
     public function score() {
         return view('quizz.score');
     }

}
