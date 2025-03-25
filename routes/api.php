<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultsController;

Route::middleware('web')->post('/checkAnswer', [QuizController::class, 'chooseAnswer']);

