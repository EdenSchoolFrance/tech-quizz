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

$stmt = 'SELECT user_quizz.id, completed_at, score, title FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id LIKE CONCAT(%, :userId ,%) AND user_quizz.id LIKE CONCAT(%, :id ,%) AND completed_at LIKE CONCAT(%, :completed_at ,%) AND score LIKE CONCAT(%, :score ,%) AND title LIKE CONCAT(%, :title ,%)';
$req = $this->pdo->prepare($stmt);
$req->execute([':userId' => $userId]);
$req->setFetchMode(\PDO::FETCH_CLASS, Result::class);