<?php

namespace App\models;

/**
 * Class responsible for managing quiz questions in the database.
 * Handles retrieving, creating, updating, and deleting questions for quizzes.
 */
class QuestionManager extends Model
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
     * Retrieve all questions for a specific quiz.
     * 
     * @param int $id The ID of the quiz whose questions are being fetched.
     * 
     * @return Question[] List of questions (as Question objects).
     */
    public function getAll($id)
    {
        // Prepare the SQL statement to fetch all questions for a specific quiz
        $stmt = 'SELECT * FROM questions WHERE quizz_id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        // Return the questions as an array of Question objects
        return $req->fetchAll();
    }

    /**
     * Retrieve all answers for a specific question.
     * 
     * @param int $questionId The ID of the question whose answers are being fetched.
     * 
     * @return Answers[] List of answers (as Answers objects).
     */
    public function getAnswers($questionId)
    {
        // Prepare the SQL statement to fetch answers for a specific question
        $stmt = 'SELECT * FROM answers WHERE question_id = :questionId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':questionId' => $questionId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Answers::class);

        // Return the answers as an array of Answers objects
        return $req->fetchAll();
    }

    /**
     * Create a new question for a specific quiz.
     * 
     * @param int $quizzId The ID of the quiz the question belongs to.
     * @param string $questionText The text of the question.
     * 
     * @return string|false The ID of the created question or false on failure.
     */
    public function create($quizzId, $questionText)
    {
        // Generate a unique ID for the new question
        $id = uniqid();
        
        // Prepare the SQL statement to insert the new question into the 'questions' table
        $stmt = 'INSERT INTO questions (id, quizz_id, question_text) VALUES (:id, :quizz_id, :question_text)';
        $req = $this->pdo->prepare($stmt);
        $result = $req->execute([
            ':id' => $id,
            ':quizz_id' => $quizzId,
            ':question_text' => $questionText
        ]);
        
        // Return the ID of the new question if the insertion was successful
        if ($result) {
            return $id;
        }
        
        // Return false if the insertion failed
        return false;
    }

    /**
     * Delete a question by its ID.
     * 
     * @param string $id The ID of the question to delete.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete($id)
    {
        // Prepare the SQL statement to delete a question by its ID
        $stmt = 'DELETE FROM questions WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([':id' => $id]);
    }

    /**
     * Retrieve a question by its ID.
     * 
     * @param string $id The ID of the question to retrieve.
     * 
     * @return Question|null The question object if found, null otherwise.
     */
    public function get($id)
    {
        // Prepare the SQL statement to fetch a question by its ID
        $stmt = 'SELECT * FROM questions WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Question::class);

        // Return the question as a Question object
        return $req->fetch();
    }

    /**
     * Update the text of a question.
     * 
     * @param string $id The ID of the question to update.
     * @param string $questionText The new text of the question.
     * 
     * @return bool True if the update was successful, false otherwise.
     */
    public function update($id, $questionText)
    {
        // Prepare the SQL statement to update the question's text
        $stmt = 'UPDATE questions SET question_text = :question_text WHERE id = :id';
        $req = $this->pdo->prepare($stmt);
        return $req->execute([
            ':id' => $id,
            ':question_text' => $questionText
        ]);
    }
}
