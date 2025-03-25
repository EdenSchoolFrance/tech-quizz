<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultsController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('results', [ResultsController::class, 'results'])->name('quizzes.results');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/quizz/', [QuizController::class, 'index']);

Route::get('/quizz/{id}/question/{idQuestion}', [QuizController::class, 'showQuestions'])->middleware('auth');
Route::get('/score', [QuizController::class, 'score']);

require __DIR__ . '/auth.php';

