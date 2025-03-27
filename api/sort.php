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

$id = $_GET['id'] ?? '';
$completed_at = $_GET['date'] ?? '';
$score = $_GET['score'] ?? '';
$title = $_GET['quizName'] ?? '';
$userId = $_GET['userId'] ?? '';

if(isset($_GET['orderBy'])) {
    if ($_GET['orderBy'] == 'date') {
        $orderBy = 'completed_at';
    } elseif($_GET['orderBy'] == 'quizName') {
        $orderBy = 'title';
    } else {
        $orderBy = $_GET['orderBy'] ?? '';
    }
    $order = $_GET['order'] ?? '';
}

$stmt = 'SELECT user_quizz.id, completed_at, score, title FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id = :userId AND user_quizz.id LIKE CONCAT(\'%\', :id ,\'%\') AND completed_at LIKE CONCAT(\'%\', :completed_at ,\'%\') AND score LIKE CONCAT(\'%\', :score ,\'%\') AND title LIKE CONCAT(\'%\', :title ,\'%\')'
    . (isset($_GET['orderBy']) ? 'ORDER BY '. $orderBy .' '. $order : '');


$req = $pdo->prepare($stmt);
$req->execute([
    ':userId' => $userId,
    ':id' => $id,
    ':completed_at' => $completed_at,
    ':score' => $score,
    ':title' => $title
]);

$quizzes = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($quizzes);
