<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizz/', [QuizController::class, 'quizz']);

Route::get('/quizz/{id}/question/{idQuestion}', [QuizController::class, 'showQuestions']);

require __DIR__. '/auth.php';
