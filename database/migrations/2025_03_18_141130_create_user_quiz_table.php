<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_quiz', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained("quizzes")->onDelete('cascade');
            $table->string('status'); // Statut du quiz pour l'utilisateur : "started", "in_progress", "completed"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quiz');
    }
};
