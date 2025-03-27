<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;

class AdminController extends Controller
{
    public function index()
    {
        $quizzes = Quizzes::all();
        return view('admin.quizz-list', [
            'quizzes' => $quizzes,
        ]);
    }
}
