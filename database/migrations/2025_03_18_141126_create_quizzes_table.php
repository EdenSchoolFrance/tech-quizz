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
            $table->string('img_url');
            $table->timestamps();
        });

        // Insertion des quiz initiaux
        DB::table('quizzes')->insert([
            ['title' => 'JavaScript', 'img_url' => 'img/quizz/javascript.svg'],
            ['title' => 'HTML', 'img_url' => 'img/quizz/html.svg'],
            ['title' => 'CSS', 'img_url' => 'img/quizz/css.svg'],
            ['title' => 'Accessibility', 'img_url' => 'img/quizz/accessibility.svg'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }

};
