<?php

namespace App\models;

/**
 * Class responsible for managing answers in the database.
 * Handles retrieving, storing, and deleting answers for quiz questions.
 */
class AnswersManager extends Model
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
     * Retrieve all answers for a specific question.
     * 
     * @param int $id The ID of the question whose answers are being fetched.
     * 
     * @return Question[] List of answers (as Question objects).
     */
    public function getAll($id)
    {
        // Prepare the SQL statement to fetch answers for a specific question
        $stmt = 'SELECT * FROM answers WHERE question_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        // Return the answers as an array of Question objects
        return $req->fetchAll();
    }

    /**
     * Retrieve the answers for a specific question (used for displaying answers).
     * 
     * @param int $id The ID of the question whose answers are being fetched.
     * 
     * @return Answers[] List of answers (as Answers objects).
     */
    public function get($id)
    {
        // Prepare the SQL statement to fetch answers for a specific question
        $stmt = 'SELECT * FROM answers WHERE question_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Answers::class);

        // Return the answers as an array of Answers objects
        return $req->fetchAll();
    }

    /**
     * Store a user's answer to a specific question in the 'user_answers' table.
     * 
     * @param int $quiz_id The ID of the quiz the user is answering.
     * @param int $user_id The ID of the user answering the question.
     * @param int $question_id The ID of the question being answered.
     * @param int $answer_id The ID of the selected answer.
     */
    public function storeUserAnswer($quiz_id, $user_id, $question_id, $answer_id) {
        // Prepare the SQL statement to insert a user's answer into the 'user_answers' table
        $stmt = 'INSERT INTO user_answers (id, user_id, question_id, answer_id) VALUES (:id, :user_id, :question_id, :answer_id)';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => uniqid(), ':user_id' => $user_id, ':question_id' => $question_id, ':answer_id' => $answer_id]);

        // Redirect to the next question in the quiz
        header('Location: /quiz/' . $quiz_id . '/' . ($question_id + 1));
    }
    
    /**
     * Create a new answer for a specific question.
     * 
     * @param int $questionId The ID of the question the answer belongs to.
     * @param string $answerText The text of the answer.
     * @param bool $isCorrect Whether the answer is correct or not.
     * 
     * @return string|false The ID of the created answer or false on failure.
     */
    public function create($questionId, $answerText, $isCorrect)
    {
        // Generate a unique ID for the new answer
        $id = uniqid();
        
        // Prepare the SQL statement to insert a new answer into the 'answers' table
        $stmt = 'INSERT INTO answers (id, question_id, answer_text, is_correct) VALUES (:id, :question_id, :answer_text, :is_correct)';
        $req = $this->pdo->prepare($stmt);
        $result = $req->execute([
            ':id' => $id,
            ':question_id' => $questionId,
            ':answer_text' => $answerText,
            ':is_correct' => $isCorrect
        ]);
        
        // Return the ID of the new answer if the insertion was successful
        if ($result) {
            return $id;
        }
        
        // Return false if the insertion failed
        return false;
    }
    
    /**
     * Delete an answer by its ID.
     * 
     * @param string $id The ID of the answer to delete.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete($id)
    {
        // Prepare the SQL statement to delete an answer by its ID
        $stmt = 'DELETE FROM answers WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':id' => $id]);
    }
    
    /**
     * Delete all answers for a specific question.
     * 
     * @param int $questionId The ID of the question whose answers are to be deleted.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteByQuestionId($questionId)
    {
        // Prepare the SQL statement to delete all answers for a specific question
        $stmt = 'DELETE FROM answers WHERE question_id = :question_id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':question_id' => $questionId]);
    }
}
