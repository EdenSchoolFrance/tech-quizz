<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
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

    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get("/admin", [AdminController::class, 'index'])->name('admin.index');
        Route::get("/admin/users", [AdminController::class, 'userManagement'])->name('admin.users');
        Route::get('admin/create-user', [AdminController::class, 'createUser']);
        Route::post('admin/create-user', [AdminController::class, 'store'])->name('admin.create-user');
        Route::delete('admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
        Route::get('admin/update-user/{id}', [AdminController::class, 'updateUserPage']);
        Route::patch('admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    });
});

Route::get('/quizz/', [QuizController::class, 'index'])->name('quizzes.index');

require __DIR__ . '/auth.php';
