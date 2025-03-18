<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_text');
            $table->string('question_type');
            $table->timestamps();
        });

        // Insertion des questions initiales
        DB::table('questions')->insert([
            ['question_text' => 'What keyword is used to declare a variable in JavaScript?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the output of console.log(typeof []) ?', 'question_type' => 'QCM'],
            ['question_text' => 'How do you write a single-line comment in JavaScript?', 'question_type' => 'QCM'],
            ['question_text' => 'What does the expression Boolean("false") return?', 'question_type' => 'QCM'],
            ['question_text' => 'Which method is used to add an element to the end of an array in JavaScript?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the output of console.log(2 + "2") ?', 'question_type' => 'QCM'],
            ['question_text' => 'Which structure is used to execute code repeatedly?', 'question_type' => 'QCM'],
            ['question_text' => 'Which object is used to manipulate dates in JavaScript?', 'question_type' => 'QCM'],
            ['question_text' => 'What does the JSON.stringify() method do?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the difference between == and === in JavaScript?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the role of HTML?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the correct tag to insert an image in HTML?', 'question_type' => 'QCM'],
            ['question_text' => 'Which tag is used to create a hyperlink?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the basic structure of an HTML document?', 'question_type' => 'QCM'],
            ['question_text' => 'Which tag is used to insert an unordered list?', 'question_type' => 'QCM'],
            ['question_text' => 'How do you create an input field for a form in HTML?', 'question_type' => 'QCM'],
            ['question_text' => 'Which tag is used to create a table in HTML?', 'question_type' => 'QCM'],
            ['question_text' => 'Which attribute allows you to open a link in a new tab?', 'question_type' => 'QCM'],
            ['question_text' => 'Which tag is used to define a navigation section?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the correct semantics for a first-level heading in HTML?', 'question_type' => 'QCM'],
            ['question_text' => 'What does CSS stand for?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS property is used to change the text color?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS selector is used to target an element with id="menu"?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS rule adds 10px of padding inside an element?', 'question_type' => 'QCM'],
            ['question_text' => 'What is the effect of display: flex; on an element?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS property is used to round the corners of an element?', 'question_type' => 'QCM'],
            ['question_text' => 'Which position value allows an element to stay fixed at the top of the page while scrolling?', 'question_type' => 'QCM'],
            ['question_text' => 'Which property is used to add a shadow to text in CSS?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS rule is used to apply a style only when the user hovers over an element?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS unit is relative to the parent element\'s font size?', 'question_type' => 'QCM'],
            ['question_text' => 'What is web accessibility?', 'question_type' => 'QCM'],
            ['question_text' => 'Which HTML tag is used to provide alternative text for images?', 'question_type' => 'QCM'],
            ['question_text' => 'What does WCAG stand for?', 'question_type' => 'QCM'],
            ['question_text' => 'Which text color provides the best contrast on a white background?', 'question_type' => 'QCM'],
            ['question_text' => 'Which ARIA attribute is used to define a text alternative when no visible text is available?', 'question_type' => 'QCM'],
            ['question_text' => 'What does keyboard navigation allow?', 'question_type' => 'QCM'],
            ['question_text' => 'Why is it important to use semantic HTML tags (<header>, <nav>, <main>, <footer>)?', 'question_type' => 'QCM'],
            ['question_text' => 'What is essential to make a website accessible to visually impaired users?', 'question_type' => 'QCM'],
            ['question_text' => 'Which CSS property improves readability for dyslexic people?', 'question_type' => 'QCM'],
            ['question_text' => 'Which tool can be used to test the accessibility of a website?', 'question_type' => 'QCM']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
