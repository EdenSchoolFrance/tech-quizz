<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index() {
        $quiz = DB::table('quiz')->get();
        return view('quiz', ['quizzes' => $quiz]);
    }
}
