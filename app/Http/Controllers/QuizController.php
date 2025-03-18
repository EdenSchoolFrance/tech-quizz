<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizzes;

class QuizController extends Controller
{
     public function index()
     {
          $quizzes = Quizzes::all();
          return view('quizz.display', [
               'quizzes' => $quizzes,
          ]);
     }

}
