<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('difficulty');
            $table->timestamps();
        });

        // Insertion des quiz initiaux
        DB::table('quizzes')->insert([
            ['title' => 'Quiz JavaScript', 'category' => 'Développement Web', 'difficulty' => 'medium'],
            ['title' => 'Quiz HTML', 'category' => 'Développement Web', 'difficulty' => 'easy'],
            ['title' => 'Quiz CSS', 'category' => 'Développement Web', 'difficulty' => 'medium'],
            ['title' => 'Quiz Accessibilité Web', 'category' => 'Développement Web', 'difficulty' => 'hard'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }

};
