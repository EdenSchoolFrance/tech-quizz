<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
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
    Route::get('/quizz/{id}/question/{idQuestion}', [QuizController::class, 'showQuestions']);
    Route::get('/score/quizz/{id}', [QuizController::class, 'score']);

    Route::get('/admin', function () {
        var_dump("vous êtes un admin");
    })->middleware([RoleMiddleware::class . ':admin']);

    Route::get('/user', function () {
        var_dump("vous êtes un user");
    })->middleware([RoleMiddleware::class . ':user']);

});

Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', function () {
        var_dump("vous êtes un admin");
    })->middleware([RoleMiddleware::class . ':admin']);
});

Route::get('/quizz/', [QuizController::class, 'index'])->name('quizzes.index');

require __DIR__ . '/auth.php';

