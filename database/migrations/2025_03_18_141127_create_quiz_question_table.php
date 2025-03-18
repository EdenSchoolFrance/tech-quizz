<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_question', function (Blueprint $table) {
            $table->foreignId('question_id')->constrained("questions")->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained("quizzes")->onDelete('cascade');
        });

        // Associer les questions aux quiz
        DB::table('quiz_question')->insert([
            // Quiz JavaScript
            ['question_id' => 1, 'quiz_id' => 1],
            ['question_id' => 2, 'quiz_id' => 1],
            ['question_id' => 3, 'quiz_id' => 1],
            ['question_id' => 4, 'quiz_id' => 1],
            ['question_id' => 5, 'quiz_id' => 1],
            ['question_id' => 6, 'quiz_id' => 1],
            ['question_id' => 7, 'quiz_id' => 1],
            ['question_id' => 8, 'quiz_id' => 1],
            ['question_id' => 9, 'quiz_id' => 1],
            ['question_id' => 10, 'quiz_id' => 1],

            // Quiz HTML
            ['question_id' => 11, 'quiz_id' => 2],
            ['question_id' => 12, 'quiz_id' => 2],
            ['question_id' => 13, 'quiz_id' => 2],
            ['question_id' => 14, 'quiz_id' => 2],
            ['question_id' => 15, 'quiz_id' => 2],
            ['question_id' => 16, 'quiz_id' => 2],
            ['question_id' => 17, 'quiz_id' => 2],
            ['question_id' => 18, 'quiz_id' => 2],
            ['question_id' => 19, 'quiz_id' => 2],
            ['question_id' => 20, 'quiz_id' => 2],

            // Quiz CSS
            ['question_id' => 21, 'quiz_id' => 3],
            ['question_id' => 22, 'quiz_id' => 3],
            ['question_id' => 23, 'quiz_id' => 3],
            ['question_id' => 24, 'quiz_id' => 3],
            ['question_id' => 25, 'quiz_id' => 3],
            ['question_id' => 26, 'quiz_id' => 3],
            ['question_id' => 27, 'quiz_id' => 3],
            ['question_id' => 28, 'quiz_id' => 3],
            ['question_id' => 29, 'quiz_id' => 3],
            ['question_id' => 30, 'quiz_id' => 3],

            // Quiz Accessibilité Web
            ['question_id' => 31, 'quiz_id' => 4],
            ['question_id' => 32, 'quiz_id' => 4],
            ['question_id' => 33, 'quiz_id' => 4],
            ['question_id' => 34, 'quiz_id' => 4],
            ['question_id' => 35, 'quiz_id' => 4],
            ['question_id' => 36, 'quiz_id' => 4],
            ['question_id' => 37, 'quiz_id' => 4],
            ['question_id' => 38, 'quiz_id' => 4],
            ['question_id' => 39, 'quiz_id' => 4],
            ['question_id' => 40, 'quiz_id' => 4],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('quiz_question');
    }
};
