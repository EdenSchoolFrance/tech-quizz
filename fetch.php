<?php

$host = 'localhost';
$dbname = 'quizz_app';
$username = 'root';
$password = '';


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erreur' => 'Erreur de connexion à la base de données: ' . $e->getMessage()]);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT * FROM questions LEFT JOIN answers ON questions.id = answers.question_id WHERE questions.id = :id');
    $stmt->execute(['id' => $_GET['id']]);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $resultats
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de la récupération des données: ' . $e->getMessage()
    ]);
}
?>