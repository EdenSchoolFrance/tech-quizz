<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\AdminController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('results', [ResultsController::class, 'results'])->name('quizzes.results');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/quizz/{id}/question/{idQuestion}', [QuizController::class, 'showQuestions']);
    Route::get('/score/quizz/{id}', [QuizController::class, 'score']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.quizzList');
    Route::get('/admin/create-quizz', [AdminController::class, 'createQuizz'])->name('admin.createQuizz');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.quizzList');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.quizzList');
});

Route::get('/quizz/', [QuizController::class, 'index'])->name('quizzes.index');

require __DIR__ . '/auth.php';

