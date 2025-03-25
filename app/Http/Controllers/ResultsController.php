<?php

namespace App\Http\Controllers;

use App\Models\Results;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function results()
    {
        $id = Auth::user()->id;
        $results = Results::query()->select("results.score", "results.created_at", "quizzes.title")->join("quizzes", "results.quiz_id", "=", 'quizzes.id')->where("results.user_id", "=", $id)->get()->toArray();
        return view('profile.results', [
            'results' => $results
        ]);
    }
}
