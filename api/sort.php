<?php

// Include configuration file with database connection details
require '../config/config.php';

// Start or resume a session
session_start();

// Set CORS headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *");                             // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");           // Allow these HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization");  // Allow these headers

try {
    // Establish a database connection using PDO
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // Enable error reporting
} catch (PDOException $e) {
    // If connection fails, return error message as JSON and exit
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Get query parameters with fallback to empty string if not set
$id = $_GET['id'] ?? '';                // Quiz ID filter
$completed_at = $_GET['date'] ?? '';    // Completion date filter
$score = $_GET['score'] ?? '';          // Score filter
$title = $_GET['quizName'] ?? '';       // Quiz name filter
$userId = $_GET['userId'] ?? '';        // User ID to fetch quizzes for

// Process sorting parameters if provided
if(isset($_GET['orderBy'])) {
    // Map frontend sorting field names to database column names
    if ($_GET['orderBy'] == 'date') {
        $orderBy = 'completed_at';     // Sort by completion date
    } elseif($_GET['orderBy'] == 'quizName') {
        $orderBy = 'title';            // Sort by quiz title
    } else {
        $orderBy = $_GET['orderBy'] ?? ''; // Use provided field name directly
    }
    $order = $_GET['order'] ?? '';     // Sort direction (ASC/DESC)
}

// Build SQL query with filters
// Select quiz data and apply LIKE filters for each parameter
// Add ORDER BY clause conditionally if sorting is requested
$stmt = 'SELECT user_quizz.id, completed_at, score, title FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id = :userId AND user_quizz.id LIKE CONCAT(\'%\', :id ,\'%\') AND completed_at LIKE CONCAT(\'%\', :completed_at ,\'%\') AND score LIKE CONCAT(\'%\', :score ,\'%\') AND title LIKE CONCAT(\'%\', :title ,\'%\')'
    . (isset($_GET['orderBy']) ? ' ORDER BY '. $orderBy .' '. $order : '');

// Prepare and execute the statement with parameter binding
$req = $pdo->prepare($stmt);
$req->execute([
    ':userId' => $userId,        // Filter by user ID (exact match)
    ':id' => $id,                // Filter by quiz ID (partial match)
    ':completed_at' => $completed_at,  // Filter by completion date (partial match)
    ':score' => $score,          // Filter by score (partial match)
    ':title' => $title           // Filter by quiz title (partial match)
]);

// Fetch all matching quiz records
$quizzes = $req->fetchAll(PDO::FETCH_ASSOC);

// Return results as JSON
echo json_encode($quizzes);