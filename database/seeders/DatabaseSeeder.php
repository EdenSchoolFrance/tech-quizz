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

        // Associer les questions aux quiz avec ordre de 1 à 10
        DB::table('quiz_question')->insert([
            // Quiz JavaScript
            ['question_id' => 1, 'quiz_id' => 1, 'order' => 1],
            ['question_id' => 2, 'quiz_id' => 1, 'order' => 2],
            ['question_id' => 3, 'quiz_id' => 1, 'order' => 3],
            ['question_id' => 4, 'quiz_id' => 1, 'order' => 4],
            ['question_id' => 5, 'quiz_id' => 1, 'order' => 5],
            ['question_id' => 6, 'quiz_id' => 1, 'order' => 6],
            ['question_id' => 7, 'quiz_id' => 1, 'order' => 7],
            ['question_id' => 8, 'quiz_id' => 1, 'order' => 8],
            ['question_id' => 9, 'quiz_id' => 1, 'order' => 9],
            ['question_id' => 10, 'quiz_id' => 1, 'order' => 10],

            // Quiz HTML
            ['question_id' => 11, 'quiz_id' => 2, 'order' => 1],
            ['question_id' => 12, 'quiz_id' => 2, 'order' => 2],
            ['question_id' => 13, 'quiz_id' => 2, 'order' => 3],
            ['question_id' => 14, 'quiz_id' => 2, 'order' => 4],
            ['question_id' => 15, 'quiz_id' => 2, 'order' => 5],
            ['question_id' => 16, 'quiz_id' => 2, 'order' => 6],
            ['question_id' => 17, 'quiz_id' => 2, 'order' => 7],
            ['question_id' => 18, 'quiz_id' => 2, 'order' => 8],
            ['question_id' => 19, 'quiz_id' => 2, 'order' => 9],
            ['question_id' => 20, 'quiz_id' => 2, 'order' => 10],

            // Quiz CSS
            ['question_id' => 21, 'quiz_id' => 3, 'order' => 1],
            ['question_id' => 22, 'quiz_id' => 3, 'order' => 2],
            ['question_id' => 23, 'quiz_id' => 3, 'order' => 3],
            ['question_id' => 24, 'quiz_id' => 3, 'order' => 4],
            ['question_id' => 25, 'quiz_id' => 3, 'order' => 5],
            ['question_id' => 26, 'quiz_id' => 3, 'order' => 6],
            ['question_id' => 27, 'quiz_id' => 3, 'order' => 7],
            ['question_id' => 28, 'quiz_id' => 3, 'order' => 8],
            ['question_id' => 29, 'quiz_id' => 3, 'order' => 9],
            ['question_id' => 30, 'quiz_id' => 3, 'order' => 10],

            // Quiz Accessibilité Web
            ['question_id' => 31, 'quiz_id' => 4, 'order' => 1],
            ['question_id' => 32, 'quiz_id' => 4, 'order' => 2],
            ['question_id' => 33, 'quiz_id' => 4, 'order' => 3],
            ['question_id' => 34, 'quiz_id' => 4, 'order' => 4],
            ['question_id' => 35, 'quiz_id' => 4, 'order' => 5],
            ['question_id' => 36, 'quiz_id' => 4, 'order' => 6],
            ['question_id' => 37, 'quiz_id' => 4, 'order' => 7],
            ['question_id' => 38, 'quiz_id' => 4, 'order' => 8],
            ['question_id' => 39, 'quiz_id' => 4, 'order' => 9],
            ['question_id' => 40, 'quiz_id' => 4, 'order' => 10],
        ]);


        DB::table('responses')->insert([
            // HTML (1 à 10)
            ['question_id' => 1, 'response_text' => 'Defines the structure of a webpage', 'is_correct' => 1],
            ['question_id' => 1, 'response_text' => 'Applies style to webpages', 'is_correct' => 0],
            ['question_id' => 1, 'response_text' => 'Adds interactivity', 'is_correct' => 0],
            ['question_id' => 1, 'response_text' => 'Stores data', 'is_correct' => 0],

            ['question_id' => 2, 'response_text' => '<image>', 'is_correct' => 0],
            ['question_id' => 2, 'response_text' => '<img>', 'is_correct' => 1],
            ['question_id' => 2, 'response_text' => '<picture>', 'is_correct' => 0],
            ['question_id' => 2, 'response_text' => '<photo>', 'is_correct' => 0],

            ['question_id' => 3, 'response_text' => '<link>', 'is_correct' => 0],
            ['question_id' => 3, 'response_text' => '<a>', 'is_correct' => 1],
            ['question_id' => 3, 'response_text' => '<href>', 'is_correct' => 0],
            ['question_id' => 3, 'response_text' => '<url>', 'is_correct' => 0],

            ['question_id' => 4, 'response_text' => '<html><head><title></title></head><body></body></html>', 'is_correct' => 1],
            ['question_id' => 4, 'response_text' => '<header><body><footer>', 'is_correct' => 0],
            ['question_id' => 4, 'response_text' => '<main><article><section>', 'is_correct' => 0],
            ['question_id' => 4, 'response_text' => '<head><content><footer>', 'is_correct' => 0],

            ['question_id' => 5, 'response_text' => '<ol>', 'is_correct' => 0],
            ['question_id' => 5, 'response_text' => '<ul>', 'is_correct' => 1],
            ['question_id' => 5, 'response_text' => '<li>', 'is_correct' => 0],
            ['question_id' => 5, 'response_text' => '<list>', 'is_correct' => 0],

            ['question_id' => 6, 'response_text' => '<text>', 'is_correct' => 0],
            ['question_id' => 6, 'response_text' => '<input type="text">', 'is_correct' => 1],
            ['question_id' => 6, 'response_text' => '<textbox>', 'is_correct' => 0],
            ['question_id' => 6, 'response_text' => '<field>', 'is_correct' => 0],

            ['question_id' => 7, 'response_text' => '<table>', 'is_correct' => 1],
            ['question_id' => 7, 'response_text' => '<tr>', 'is_correct' => 0],
            ['question_id' => 7, 'response_text' => '<td>', 'is_correct' => 0],
            ['question_id' => 7, 'response_text' => '<tab>', 'is_correct' => 0],

            ['question_id' => 8, 'response_text' => 'target="_self"', 'is_correct' => 0],
            ['question_id' => 8, 'response_text' => 'target="_new"', 'is_correct' => 0],
            ['question_id' => 8, 'response_text' => 'target="_blank"', 'is_correct' => 1],
            ['question_id' => 8, 'response_text' => 'target="new_tab"', 'is_correct' => 0],

            ['question_id' => 9, 'response_text' => '<nav>', 'is_correct' => 1],
            ['question_id' => 9, 'response_text' => '<menu>', 'is_correct' => 0],
            ['question_id' => 9, 'response_text' => '<section>', 'is_correct' => 0],
            ['question_id' => 9, 'response_text' => '<header>', 'is_correct' => 0],

            ['question_id' => 10, 'response_text' => '<head>', 'is_correct' => 0],
            ['question_id' => 10, 'response_text' => '<title>', 'is_correct' => 0],
            ['question_id' => 10, 'response_text' => '<h1>', 'is_correct' => 1],
            ['question_id' => 10, 'response_text' => '<header>', 'is_correct' => 0],

            ['question_id' => 11, 'response_text' => 'Creative Style Sheets', 'is_correct' => 0],
            ['question_id' => 11, 'response_text' => 'Cascading Style Sheets', 'is_correct' => 1],
            ['question_id' => 11, 'response_text' => 'Computer Styled Sections', 'is_correct' => 0],
            ['question_id' => 11, 'response_text' => 'Colorful Style Sheets', 'is_correct' => 0],

            ['question_id' => 12, 'response_text' => 'text-color', 'is_correct' => 0],
            ['question_id' => 12, 'response_text' => 'color', 'is_correct' => 1],
            ['question_id' => 12, 'response_text' => 'font-color', 'is_correct' => 0],
            ['question_id' => 12, 'response_text' => 'text-style', 'is_correct' => 0],

            ['question_id' => 13, 'response_text' => '.menu', 'is_correct' => 0],
            ['question_id' => 13, 'response_text' => '#menu', 'is_correct' => 1],
            ['question_id' => 13, 'response_text' => 'menu', 'is_correct' => 0],
            ['question_id' => 13, 'response_text' => '*menu*', 'is_correct' => 0],

            ['question_id' => 14, 'response_text' => 'margin: 10px;', 'is_correct' => 0],
            ['question_id' => 14, 'response_text' => 'padding: 10px;', 'is_correct' => 1],
            ['question_id' => 14, 'response_text' => 'spacing: 10px;', 'is_correct' => 0],
            ['question_id' => 14, 'response_text' => 'border-spacing: 10px;', 'is_correct' => 0],

            ['question_id' => 15, 'response_text' => 'It prevents the element from being displayed', 'is_correct' => 0],
            ['question_id' => 15, 'response_text' => 'It aligns child elements in a row or column', 'is_correct' => 1],
            ['question_id' => 15, 'response_text' => 'It turns the element into a table', 'is_correct' => 0],
            ['question_id' => 15, 'response_text' => 'It forces the element to take up the full width', 'is_correct' => 0],

            ['question_id' => 16, 'response_text' => 'corner-radius', 'is_correct' => 0],
            ['question_id' => 16, 'response_text' => 'border-radius', 'is_correct' => 1],
            ['question_id' => 16, 'response_text' => 'rounding', 'is_correct' => 0],
            ['question_id' => 16, 'response_text' => 'border-style', 'is_correct' => 0],

            ['question_id' => 17, 'response_text' => 'relative', 'is_correct' => 0],
            ['question_id' => 17, 'response_text' => 'absolute', 'is_correct' => 0],
            ['question_id' => 17, 'response_text' => 'fixed', 'is_correct' => 1],
            ['question_id' => 17, 'response_text' => 'static', 'is_correct' => 0],

            ['question_id' => 18, 'response_text' => 'text-decoration', 'is_correct' => 0],
            ['question_id' => 18, 'response_text' => 'text-shadow', 'is_correct' => 1],
            ['question_id' => 18, 'response_text' => 'box-shadow', 'is_correct' => 0],
            ['question_id' => 18, 'response_text' => 'shadow-effect', 'is_correct' => 0],

            ['question_id' => 19, 'response_text' => ':focus', 'is_correct' => 0],
            ['question_id' => 19, 'response_text' => ':visited', 'is_correct' => 0],
            ['question_id' => 19, 'response_text' => ':hover', 'is_correct' => 1],
            ['question_id' => 19, 'response_text' => ':active', 'is_correct' => 0],

            ['question_id' => 20, 'response_text' => 'px', 'is_correct' => 0],
            ['question_id' => 20, 'response_text' => 'em', 'is_correct' => 1],
            ['question_id' => 20, 'response_text' => '%', 'is_correct' => 0],
            ['question_id' => 20, 'response_text' => 'vh', 'is_correct' => 0],

            ['question_id' => 21, 'response_text' => 'let', 'is_correct' => 0],
            ['question_id' => 21, 'response_text' => 'var', 'is_correct' => 0],
            ['question_id' => 21, 'response_text' => 'const', 'is_correct' => 0],
            ['question_id' => 21, 'response_text' => 'All of the above', 'is_correct' => 1],

            ['question_id' => 22, 'response_text' => '"array"', 'is_correct' => 0],
            ['question_id' => 22, 'response_text' => '"object"', 'is_correct' => 1],
            ['question_id' => 22, 'response_text' => '"undefined"', 'is_correct' => 0],
            ['question_id' => 22, 'response_text' => '"function"', 'is_correct' => 0],

            ['question_id' => 23, 'response_text' => '# This is a comment', 'is_correct' => 0],
            ['question_id' => 23, 'response_text' => '/* This is a comment */', 'is_correct' => 0],
            ['question_id' => 23, 'response_text' => '// This is a comment', 'is_correct' => 1],
            ['question_id' => 23, 'response_text' => '␈␈ This is a comment', 'is_correct' => 0],

            ['question_id' => 24, 'response_text' => 'true', 'is_correct' => 1],
            ['question_id' => 24, 'response_text' => 'false', 'is_correct' => 0],
            ['question_id' => 24, 'response_text' => 'undefined', 'is_correct' => 0],
            ['question_id' => 24, 'response_text' => 'NaN', 'is_correct' => 0],

            ['question_id' => 25, 'response_text' => '.push()', 'is_correct' => 1],
            ['question_id' => 25, 'response_text' => '.pop()', 'is_correct' => 0],
            ['question_id' => 25, 'response_text' => '.shift()', 'is_correct' => 0],
            ['question_id' => 25, 'response_text' => '.unshift()', 'is_correct' => 0],

            ['question_id' => 26, 'response_text' => '4', 'is_correct' => 0],
            ['question_id' => 26, 'response_text' => '22', 'is_correct' => 1],
            ['question_id' => 26, 'response_text' => 'NaN', 'is_correct' => 0],
            ['question_id' => 26, 'response_text' => 'TypeError', 'is_correct' => 0],

            ['question_id' => 27, 'response_text' => 'if', 'is_correct' => 0],
            ['question_id' => 27, 'response_text' => 'switch', 'is_correct' => 0],
            ['question_id' => 27, 'response_text' => 'loop', 'is_correct' => 0],
            ['question_id' => 27, 'response_text' => 'for', 'is_correct' => 1],

            ['question_id' => 28, 'response_text' => 'Date', 'is_correct' => 1],
            ['question_id' => 28, 'response_text' => 'Time', 'is_correct' => 0],
            ['question_id' => 28, 'response_text' => 'Clock', 'is_correct' => 0],
            ['question_id' => 28, 'response_text' => 'Calendar', 'is_correct' => 0],

            ['question_id' => 29, 'response_text' => 'Converts a JavaScript object to a JSON string', 'is_correct' => 1],
            ['question_id' => 29, 'response_text' => 'Converts a JSON string to a JavaScript object', 'is_correct' => 0],
            ['question_id' => 29, 'response_text' => 'Checks if a string is in JSON format', 'is_correct' => 0],
            ['question_id' => 29, 'response_text' => 'None of the above', 'is_correct' => 0],

            ['question_id' => 30, 'response_text' => 'No difference', 'is_correct' => 0],
            ['question_id' => 30, 'response_text' => '== compares values only, while === compares both values and types', 'is_correct' => 1],

            ['question_id' => 31, 'response_text' => 'A set of rules to make a website faster', 'is_correct' => 0],
            ['question_id' => 31, 'response_text' => 'Adapting websites for users with disabilities', 'is_correct' => 1],
            ['question_id' => 31, 'response_text' => 'A principle to improve search engine optimization', 'is_correct' => 0],
            ['question_id' => 31, 'response_text' => 'A technology for creating animations', 'is_correct' => 0],

            ['question_id' => 32, 'response_text' => 'title', 'is_correct' => 0],
            ['question_id' => 32, 'response_text' => 'alt', 'is_correct' => 1],
            ['question_id' => 32, 'response_text' => 'aria-label', 'is_correct' => 0],
            ['question_id' => 32, 'response_text' => 'desc', 'is_correct' => 0],

            ['question_id' => 33, 'response_text' => 'Web Content Accessibility Guidelines', 'is_correct' => 1],
            ['question_id' => 33, 'response_text' => 'Web Compliance and Accessibility Guide', 'is_correct' => 0],
            ['question_id' => 33, 'response_text' => 'Worldwide Content Accessibility Guide', 'is_correct' => 0],
            ['question_id' => 33, 'response_text' => 'Web Color Accessibility Guidelines', 'is_correct' => 0],

            ['question_id' => 34, 'response_text' => 'Yellow', 'is_correct' => 0],
            ['question_id' => 34, 'response_text' => 'Light blue', 'is_correct' => 0],
            ['question_id' => 34, 'response_text' => 'Black', 'is_correct' => 1],
            ['question_id' => 34, 'response_text' => 'Light gray', 'is_correct' => 0],

            ['question_id' => 35, 'response_text' => 'aria-hidden', 'is_correct' => 0],
            ['question_id' => 35, 'response_text' => 'aria-label', 'is_correct' => 1],
            ['question_id' => 35, 'response_text' => 'aria-description', 'is_correct' => 0],
            ['question_id' => 35, 'response_text' => 'alt', 'is_correct' => 0],

            ['question_id' => 36, 'response_text' => 'Navigating only in forms', 'is_correct' => 0],
            ['question_id' => 36, 'response_text' => 'Navigating a website without using the mouse', 'is_correct' => 1],
            ['question_id' => 36, 'response_text' => 'Modifying page displays', 'is_correct' => 0],
            ['question_id' => 36, 'response_text' => 'Using keyboard shortcuts to code', 'is_correct' => 0],

            ['question_id' => 37, 'response_text' => 'To better structure the page and improve accessibility', 'is_correct' => 1],
            ['question_id' => 37, 'response_text' => 'To make the website faster', 'is_correct' => 0],
            ['question_id' => 37, 'response_text' => 'To avoid using CSS', 'is_correct' => 0],
            ['question_id' => 37, 'response_text' => 'To add animations', 'is_correct' => 0],

            ['question_id' => 38, 'response_text' => 'A colorful design', 'is_correct' => 0],
            ['question_id' => 38, 'response_text' => 'Text that is readable with good contrast', 'is_correct' => 1],
            ['question_id' => 38, 'response_text' => 'Fancy fonts', 'is_correct' => 0],
            ['question_id' => 38, 'response_text' => 'Large images', 'is_correct' => 0],

            ['question_id' => 39, 'response_text' => 'letter-spacing: 0;', 'is_correct' => 0],
            ['question_id' => 39, 'response_text' => 'font-family: Arial, sans-serif;', 'is_correct' => 1],
            ['question_id' => 39, 'response_text' => 'text-transform: uppercase;', 'is_correct' => 0],
            ['question_id' => 39, 'response_text' => 'word-spacing: -2px;', 'is_correct' => 0],

            ['question_id' => 40, 'response_text' => 'Google PageSpeed', 'is_correct' => 0],
            ['question_id' => 40, 'response_text' => 'Lighthouse', 'is_correct' => 1],
            ['question_id' => 40, 'response_text' => 'Photoshop', 'is_correct' => 0],
            ['question_id' => 40, 'response_text' => 'Figma', 'is_correct' => 0],
        ]);
    }
}
