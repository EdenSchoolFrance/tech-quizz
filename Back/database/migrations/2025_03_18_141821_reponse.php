<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reponse', function (Blueprint $table) {
            $table->id('reponse_id');
            $table->string('label');
            $table->boolean('is_correct');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('question_id')->on('question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponse');
    }
};
