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
        schema::create('historique', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('score');
            $table->string('user_id')->references('id')->on('user');
            $table->string('quiz_id')->references('id')->on('quiz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique');
    }
};
