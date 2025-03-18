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
    }

    public function down()
    {
        Schema::dropIfExists('quiz_question');
    }
};
