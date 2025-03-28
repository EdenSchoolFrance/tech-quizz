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

try {
    // Check if we have multiple answers (comma-separated)
    if (strpos($_GET['result'], ',') !== false) {
        // Split the comma-separated answers into an array
        $answers = explode(',', $_GET['result']);

        // Process each answer separately
        foreach ($answers as $answer) {
            // Prepare SQL statement for inserting user answers
            $stmt = 'INSERT INTO user_answers (id, try_id, user_id, question_id, answer_id) VALUES (:id, :try_id, :user_id, :question_id, :answer_id)';
            $req = $pdo->prepare($stmt);

            // Execute the statement with parameter binding
            $req->execute([
                ':id' => uniqid(),                   // Generate unique ID for the answer entry
                ':user_id' => $_GET['userId'],       // User who provided the answer
                ':try_id' => $_GET['tryId'],         // ID of the current quiz attempt
                ':question_id' => $_GET['questionId'], // Question being answered
                ':answer_id' => $answer              // The selected answer ID
            ]);
        }
    } else {
        // Handle single answer (backward compatibility)
        $stmt = 'INSERT INTO user_answers (id, try_id, user_id, question_id, answer_id) VALUES (:id, :try_id, :user_id, :question_id, :answer_id)';
        $req = $pdo->prepare($stmt);

        // Execute the statement with parameter binding
        $req->execute([
            ':id' => uniqid(),                   // Generate unique ID for the answer entry
            ':user_id' => $_GET['userId'],       // User who provided the answer
            ':try_id' => $_GET['tryId'],         // ID of the current quiz attempt
            ':question_id' => $_GET['questionId'], // Question being answered
            ':answer_id' => $_GET['result']      // The selected answer ID
        ]);
    }
} catch (PDOException $e) {
    // If query fails, return error message as JSON
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}