<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Quizzes;
use App\Models\Responses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Results;

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

    public function showQuestions($idQuiz, $idOrder, Request $request)
    {
        if ($idOrder == 1) {
            $request->session()->put('score', 0);
        }

        return $this->getResponsesAndQuestions($idQuiz, $idOrder);
    }

    public function chooseAnswer(Request $request)
    {
        $questionId = $request->input("questionId");
        $answerId = $request->input('selectedAnswerId');

        if (!$request->session()->has('score')) {
            $request->session()->put('score', 0);
        }

        $getAnswer = Responses::query()->find($answerId);

        if (!$getAnswer || $getAnswer->question_id != $questionId) {
            return response()->json([
                "success" => false,
                "Message" => "This answer does not match with any question"
            ]);
        }

        $correctAnswer = Responses::query()
            ->select("id")
            ->where("is_correct", "=", 1)
            ->where("question_id", "=", $questionId)
            ->get();

        if ($getAnswer->is_correct !== 1) {
            $currentScore = $request->session()->get('score');
            return response()->json([
                "success" => false,
                "correctAnswer" => $correctAnswer,
                "currentScore" => $currentScore
            ]);
        }
        $request->session()->increment('score');
        $currentScore = $request->session()->get('score');

        return response()->json([
            "success" => true,
            "correctAnswer" => $correctAnswer,
            "currentScore" => $currentScore
        ]);
    }

    public function score(Request $request, $idQuiz)
    {
        $userId = Auth::id();
        $score = $request->session()->get('score');

        if ($score === null) {
            abort(404);
        }

        try {
            Results::query()->insert([
                'quiz_id' => $idQuiz,
                'score' => $score,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Exception $e) {
            dd('Erreur lors de l’insertion : ' . $e->getMessage());
        }

        $request->session()->forget(['score']);

        $quizz = Quizzes::query()->findOrFail($idQuiz);
        return view('quizz.score', ['score' => $score, 'quizz' => $quizz]);
    }

}
