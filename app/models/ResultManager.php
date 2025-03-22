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
        $stmt = 'SELECT * FROM user_quizz WHERE user_id = :userId';
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

    public function storeQuiz($id, $score)
    {
        $stmt = 'INSERT INTO user_quizz (id, user_id, quizz_id, score) VALUES (:id, :user_id, :quizz_id, :score)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':user_id' => $_SESSION['user']->getId(), ':quizz_id' => $id, ':score' => $score]);
    }

    public function score($id)
    {
        $stmt = 'SELECT answers.id, is_correct FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);

        $result = $req->fetchAll();

        $score = 0;

        foreach($_SESSION['result'] as $key => $value) {
            foreach ($result as $k => $v) {
                if ($result[$k]['is_correct'] == 1 && $result[$k]['id'] == $value) {
                    $score++;
                    break;
                }
            }
        }

        return $score .' / '. count($_SESSION['result']);
    }
}