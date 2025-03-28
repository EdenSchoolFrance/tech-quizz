<?php

// Include configuration file with database connection details
require_once '../config/config.php';

// Set HTTP headers for API response
header('Content-Type: application/json'); // Set response format to JSON
header("Access-Control-Allow-Origin: *"); // Allow cross-origin requests from any domain
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Allow specific headers

// Handle preflight requests (OPTIONS method)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

try {
    // Establish database connection
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error reporting
} catch (PDOException $e) {
    // Return error message if database connection fails
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

try {
    // Get quiz information by ID
    $stmt = 'SELECT * FROM quizz WHERE id = ?';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(1, $_GET['id']);
    $stmt->execute();
    $quizz = $stmt->fetch(PDO::FETCH_ASSOC);

    // Count total number of questions in this quiz
    $stmt = 'SELECT count(*) FROM questions WHERE quizz_id = ?';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(1, $_GET['id']);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    // Get specific question ID based on offset (pagination)
    $stmt = 'SELECT id FROM questions WHERE quizz_id = :id LIMIT 1 OFFSET :offset';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->bindValue(':offset', (int)$_GET['limit']-1, PDO::PARAM_INT);
    $stmt->execute();
    $question = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get question and its answers
    // Conditionally include 'is_correct' field if 'answers' parameter is provided
    $stmt = 'SELECT questions.id Id_question, answers.id Id_reponse, question_text, answer_text '. (isset($_GET['answers']) ? ', is_correct' : '') .' FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = ? AND questions.id = ?';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(1, $_GET['id']);
    $stmt->bindValue(2, $question['id']);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Count number of answers for this question
    $stmt = 'SELECT COUNT(*) FROM answers WHERE question_id = ?';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(1, $question['id']);
    $stmt->execute();
    $num_answers = $stmt->fetchColumn();

    // Add metadata to the response
    $questions += ['num_answers' => $num_answers]; // Number of answers
    $questions += ['count' => $count]; // Total question count
    $questions += ['title' => $quizz['title']]; // Quiz title

    // Return JSON response
    echo json_encode($questions);
} catch (PDOException $e) {
    // Return error message if query fails
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}