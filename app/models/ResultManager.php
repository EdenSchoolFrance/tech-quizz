<?php

namespace App\models;

class ResultManager extends Model
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = $this->getDatabase();
        } catch (\PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    public function getResultsByUser($userId)
    {
        $stmt = 'SELECT user_quizz.id, completed_at, score, title FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id = :userId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':userId' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        return $req->fetchAll();
    }

    public function storeAnswers($index, $id)
    {
        $stmt = 'SELECT * FROM questions WHERE quizz_id = :id LIMIT 1 OFFSET :offset';
        $req = $this->pdo->prepare($stmt);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->bindValue(':offset', $index, \PDO::PARAM_INT);
        $req->execute();

        $question = $req->fetch();

        $stmt = 'SELECT * FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = :id AND questions.id = :question_id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id, ':question_id' => $question['id']]);

        $result = $req->fetchAll();

        $stmt = 'INSERT INTO user_answers (id, user_id, question_id, answer_id) VALUES (:id, :user_id, :question_id, :answer_id)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':user_id' => $_SESSION['user']->getId(), ':question_id' => $result[0]['question_id'], ':answer_id' => $_SESSION['result'][$index]]);
    }

    public function storeQuiz($id, $score, $tryId)
    {
        $stmt = 'INSERT INTO user_quizz (id, try_id, user_id, quizz_id, score) VALUES (:id, :tryId , :user_id, :quizz_id, :score)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':tryId' => $tryId, ':user_id' => $_SESSION['user']->getId(), ':quizz_id' => $id, ':score' => $score[0] . '/' . $score[1]]);
    }

    public function score($id, $tryId)
    {
        $stmt = 'SELECT answers.id, is_correct FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);

        $result = $req->fetchAll();

        $stmt = 'SELECT answer_id FROM user_answers WHERE try_id = :tryId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':tryId' => $tryId]);

        $answers = $req->fetchAll();

        $score = 0;

        foreach ($result as $key => $value) {
            foreach ($answers as $answer) {
                if ($value['id'] == $answer['answer_id'] && $value['is_correct'] == 1) {
                    $score++;
                }
            }
        }


        return [ $score, count($answers)];
    }
}