<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained("questions")->onDelete('cascade');
            $table->string('response_text', 200);
            $table->boolean('is_correct');
            $table->timestamps();
        });

        // Insertion des réponses initiales
        DB::table('responses')->insert([
            // Question 1
            ['question_id' => 1, 'response_text' => 'let', 'is_correct' => 0],
            ['question_id' => 1, 'response_text' => 'var', 'is_correct' => 0],
            ['question_id' => 1, 'response_text' => 'const', 'is_correct' => 0],
            ['question_id' => 1, 'response_text' => 'All of the above', 'is_correct' => 1],

            // Question 2
            ['question_id' => 2, 'response_text' => '"array"', 'is_correct' => 0],
            ['question_id' => 2, 'response_text' => '"object"', 'is_correct' => 1],
            ['question_id' => 2, 'response_text' => '"undefined"', 'is_correct' => 0],
            ['question_id' => 2, 'response_text' => '"function"', 'is_correct' => 0],

            // Question 3
            ['question_id' => 3, 'response_text' => '# This is a comment', 'is_correct' => 0],
            ['question_id' => 3, 'response_text' => '/* This is a comment */', 'is_correct' => 0],
            ['question_id' => 3, 'response_text' => '// This is a comment', 'is_correct' => 1],
            ['question_id' => 3, 'response_text' => '-- This is a comment', 'is_correct' => 0],

            // Question 11
            ['question_id' => 11, 'response_text' => 'Defines the structure of a webpage', 'is_correct' => 1],
            ['question_id' => 11, 'response_text' => 'Applies style to webpages', 'is_correct' => 0],
            ['question_id' => 11, 'response_text' => 'Adds interactivity', 'is_correct' => 0],
            ['question_id' => 11, 'response_text' => 'Stores data', 'is_correct' => 0],

            // Question 12
            ['question_id' => 12, 'response_text' => '<image>', 'is_correct' => 0],
            ['question_id' => 12, 'response_text' => '<img>', 'is_correct' => 1],
            ['question_id' => 12, 'response_text' => '<picture>', 'is_correct' => 0],
            ['question_id' => 12, 'response_text' => '<photo>', 'is_correct' => 0],

            // Question 21
            ['question_id' => 21, 'response_text' => 'Creative Style Sheets', 'is_correct' => 0],
            ['question_id' => 21, 'response_text' => 'Cascading Style Sheets', 'is_correct' => 1],
            ['question_id' => 21, 'response_text' => 'Computer Styled Sections', 'is_correct' => 0],
            ['question_id' => 21, 'response_text' => 'Colorful Style Sheets', 'is_correct' => 0],

            // Question 22
            ['question_id' => 22, 'response_text' => 'text-color', 'is_correct' => 0],
            ['question_id' => 22, 'response_text' => 'color', 'is_correct' => 1],
            ['question_id' => 22, 'response_text' => 'font-color', 'is_correct' => 0],
            ['question_id' => 22, 'response_text' => 'text-style', 'is_correct' => 0],

            // Question 31
            ['question_id' => 31, 'response_text' => 'A set of rules to make a website faster', 'is_correct' => 0],
            ['question_id' => 31, 'response_text' => 'Adapting websites for users with disabilities', 'is_correct' => 1],
            ['question_id' => 31, 'response_text' => 'A principle to improve SEO', 'is_correct' => 0],
            ['question_id' => 31, 'response_text' => 'A technology for creating animations', 'is_correct' => 0],

            // Question 32
            ['question_id' => 32, 'response_text' => 'title', 'is_correct' => 0],
            ['question_id' => 32, 'response_text' => 'alt', 'is_correct' => 1],
            ['question_id' => 32, 'response_text' => 'aria-label', 'is_correct' => 0],
            ['question_id' => 32, 'response_text' => 'desc', 'is_correct' => 0],

            // Question 33
            ['question_id' => 33, 'response_text' => 'Web Content Accessibility Guidelines', 'is_correct' => 1],
            ['question_id' => 33, 'response_text' => 'World Community Accessibility Guidelines', 'is_correct' => 0],
            ['question_id' => 33, 'response_text' => 'Web Customization and Accessibility Guide', 'is_correct' => 0],
            ['question_id' => 33, 'response_text' => 'Website Creation and Accessibility Guidelines', 'is_correct' => 0],

            // Question 40
            ['question_id' => 40, 'response_text' => 'Google Lighthouse', 'is_correct' => 1],
            ['question_id' => 40, 'response_text' => 'Google Translate', 'is_correct' => 0],
            ['question_id' => 40, 'response_text' => 'Chrome DevTools', 'is_correct' => 0],
            ['question_id' => 40, 'response_text' => 'Bootstrap', 'is_correct' => 0],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('responses');
    }
};
