<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insertion des quiz initiaux
        DB::table('quizzes')->insert([
            ['title' => 'HTML', 'img_url' => 'img/quizz/html.svg'],
            ['title' => 'CSS', 'img_url' => 'img/quizz/css.svg'],
            ['title' => 'JavaScript', 'img_url' => 'img/quizz/javascript.svg'],
            ['title' => 'Accessibility', 'img_url' => 'img/quizz/accessibility.svg'],
        ]);

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
}
