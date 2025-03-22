<?php

require_once '../config/config.php';

header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

try {
    $stmt = 'SELECT count(*) FROM questions WHERE quizz_id = ?';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    $stmt = 'SELECT * FROM questions WHERE quizz_id = :id LIMIT 1 OFFSET :offset';
    $stmt = $pdo->prepare($stmt);
    $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$_GET['limit']-1, PDO::PARAM_INT);
    $stmt->execute();

    $question = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = 'SELECT questions.id Id_question, answers.id Id_reponse, question_text, answer_text '. (isset($_GET['answers']) ? ', is_correct' : '') .' FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = ? AND questions.id = ?';
    $stmt = $pdo->prepare($stmt);
    $limit = (int)$_GET['limit'] * 4;
    $offset = (int)$_GET['limit'] * 4 - 4;
    $stmt->bindValue(1, $_GET['id'], PDO::PARAM_INT);
    $stmt->bindValue(2, $question['id'], PDO::PARAM_INT);
    $stmt->execute();

    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $questions += ['4' => $count];
    echo json_encode($questions);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Query failed: ' . $e->getMessage()]);
}