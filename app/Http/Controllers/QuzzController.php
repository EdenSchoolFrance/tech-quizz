<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuzzController extends Controller
{
    public function displayAll() {
        $all = Quiz::all();
        return view('quiz', ['quizzes' => $all]);
    }

    public function displayOne(string $id)
    {
        $quizData = Quiz::where('ID_QUIZ', $id)->first();


        return view('quizGame', ['quiz' => $quizData]);
    }
}
