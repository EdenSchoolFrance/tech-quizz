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

}
