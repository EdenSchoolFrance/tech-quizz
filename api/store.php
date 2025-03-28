<?php

require '../config/config.php';

session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

try {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

try {
    // Check if we have multiple answers (comma-separated)
    if (strpos($_GET['result'], ',') !== false) {
        $answers = explode(',', $_GET['result']);
        foreach ($answers as $answer) {
            $stmt = 'INSERT INTO user_answers (id, try_id, user_id, question_id, answer_id) VALUES (:id, :try_id, :user_id, :question_id, :answer_id)';
            $req = $pdo->prepare($stmt);
            $req->execute([
                ':id' => uniqid(), 
                ':user_id' => $_GET['userId'], 
                ':try_id' => $_GET['tryId'], 
                ':question_id' => $_GET['questionId'], 
                ':answer_id' => $answer
            ]);
        }
    } else {
        // Single answer (backward compatibility)
        $stmt = 'INSERT INTO user_answers (id, try_id, user_id, question_id, answer_id) VALUES (:id, :try_id, :user_id, :question_id, :answer_id)';
        $req = $pdo->prepare($stmt);
        $req->execute([
            ':id' => uniqid(), 
            ':user_id' => $_GET['userId'], 
            ':try_id' => $_GET['tryId'], 
            ':question_id' => $_GET['questionId'], 
            ':answer_id' => $_GET['result']
        ]);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}
