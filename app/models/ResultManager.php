<?php

namespace App\models;

/**
 * Class responsible for managing quiz results and answers in the database.
 * Handles operations such as retrieving results, storing user answers, storing quiz results, and calculating scores.
 */
class ResultManager extends Model
{
    private $pdo;

    /**
     * Initialize the database connection.
     * 
     * @throws \PDOException If the connection to the database fails.
     */
    public function __construct()
    {
        try {
            // Establish a connection to the database
            $this->pdo = $this->getDatabase();
        } catch (\PDOException $e) {
            // Handle connection error
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    /**
     * Retrieve the results of quizzes completed by a user.
     * 
     * @param string $userId The ID of the user whose results are being fetched.
     * 
     * @return Result[] List of results (as Result objects) for the given user.
     */
    public function getResultsByUser($userId)
    {
        // Prepare the SQL statement to fetch the results of the quizzes completed by the user
        $stmt = 'SELECT user_quizz.id, completed_at, score, title FROM user_quizz JOIN quizz ON user_quizz.quizz_id = quizz.id WHERE user_id = :userId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':userId' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        // Return the results as an array of Result objects
        return $req->fetchAll();
    }

    /**
     * Store the answers provided by the user for a specific quiz.
     * 
     * @param int $index The index of the current question in the quiz.
     * @param string $id The ID of the quiz being answered.
     */
    public function storeAnswers($index, $id)
    {
        // Retrieve the question for the current index in the quiz
        $stmt = 'SELECT * FROM questions WHERE quizz_id = :id LIMIT 1 OFFSET :offset';
        $req = $this->pdo->prepare($stmt);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->bindValue(':offset', $index, \PDO::PARAM_INT);
        $req->execute();

        $question = $req->fetch();

        // Retrieve the possible answers for the current question
        $stmt = 'SELECT * FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = :id AND questions.id = :question_id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id, ':question_id' => $question['id']]);

        $result = $req->fetchAll();

        // Store the user's answer to the current question in the 'user_answers' table
        $stmt = 'INSERT INTO user_answers (id, user_id, question_id, answer_id) VALUES (:id, :user_id, :question_id, :answer_id)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':user_id' => $_SESSION['user']->getId(), ':question_id' => $result[0]['question_id'], ':answer_id' => $_SESSION['result'][$index]]);
    }

    /**
     * Store the result of a quiz attempt.
     * 
     * @param string $id The ID of the quiz.
     * @param array $score The score of the user (correct answers / total questions).
     * @param string $tryId The ID of the quiz attempt.
     */
    public function storeQuiz($id, $score, $tryId)
    {
        // Insert the quiz result into the 'user_quizz' table
        $stmt = 'INSERT INTO user_quizz (id, try_id, user_id, quizz_id, score) VALUES (:id, :tryId , :user_id, :quizz_id, :score)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':tryId' => $tryId, ':user_id' => $_SESSION['user']->getId(), ':quizz_id' => $id, ':score' => $score[0] . '/' . $score[1]]);
    }

    /**
     * Calculate the score for a specific quiz attempt based on the user's answers.
     * 
     * @param string $id The ID of the quiz.
     * @param string $tryId The ID of the quiz attempt.
     * 
     * @return array The user's score and the total number of answers (correct/total).
     */
    public function score($id, $tryId)
    {
        // Retrieve the correct answers for each question in the quiz
        $stmt = 'SELECT answers.id, is_correct FROM questions JOIN answers ON questions.id = answers.question_id WHERE quizz_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);

        $result = $req->fetchAll();

        // Retrieve the user's answers for the given quiz attempt
        $stmt = 'SELECT answer_id FROM user_answers WHERE try_id = :tryId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':tryId' => $tryId]);

        $answers = $req->fetchAll();

        // Initialize the score counter
        $score = 0;

        // Compare the user's answers with the correct answers to calculate the score
        foreach ($result as $key => $value) {
            foreach ($answers as $answer) {
                if ($value['id'] == $answer['answer_id'] && $value['is_correct'] == 1) {
                    $score++;
                }
            }
        }

        // Return the score and the total number of answers
        return [ $score, count($answers)];
    }
}
