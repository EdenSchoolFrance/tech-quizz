<?php

namespace App\models;

/**
 * Class responsible for managing quizzes in the database.
 * Handles operations such as creating, retrieving, updating, and deleting quizzes.
 */
class QuizManager extends Model
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
            die("Error while connecting the database: " . $e->getMessage());
        }
    }

    /**
     * Retrieve all quizzes.
     * 
     * @return Quiz[] List of quizzes (as Quiz objects).
     */
    public function getAll()
    {
        // Prepare the SQL statement to fetch all quizzes
        $req = $this->pdo->query('SELECT * FROM quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        // Return the quizzes as an array of Quiz objects
        return $req->fetchAll();
    }

    /**
     * Retrieve a specific quiz by its ID.
     * 
     * @param string $id The ID of the quiz to retrieve.
     * 
     * @return Quiz|null The quiz object if found, null otherwise.
     */
    public function get($id)
    {
        // Prepare the SQL statement to fetch a quiz by its ID
        $req = $this->pdo->prepare('SELECT * FROM quizz WHERE id = :id');
        $req->execute(['id' => $id]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);

        // Return the quiz as a Quiz object
        return $req->fetch();
    }

    /**
     * Create a new quiz.
     * 
     * @param string $title The title of the quiz.
     * @param string $description The description of the quiz.
     * @param string $userId The ID of the user creating the quiz.
     * 
     * @return string|false The ID of the created quiz or false on failure.
     */
    public function create($title, $description, $userId)
    {
        // Generate a unique ID for the new quiz
        $id = uniqid();
        
        // Prepare the SQL statement to insert the new quiz into the 'quizz' table
        $req = $this->pdo->prepare('INSERT INTO quizz (id, title, description, created_by) VALUES (:id, :title, :description, :created_by)');
        
        $result = $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'created_by' => $userId
        ]);
        
        // Return the ID of the new quiz if the insertion was successful
        if ($result) {
            return $id;
        }
        
        // Return false if the insertion failed
        return false;
    }

    /**
     * Delete a quiz by its ID.
     * 
     * @param string $id The ID of the quiz to delete.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete($id)
    {
        // Prepare the SQL statement to delete a quiz by its ID
        $req = $this->pdo->prepare('DELETE FROM quizz WHERE id = :id');
        return $req->execute(['id' => $id]);
    }

    /**
     * Retrieve all quizzes created by a specific user.
     * 
     * @param string $userId The ID of the user whose quizzes are being fetched.
     * 
     * @return Quiz[] List of quizzes created by the user (as Quiz objects).
     */
    public function getQuizzesByUser($userId)
    {
        // Prepare the SQL statement to fetch all quizzes created by the specified user
        $req = $this->pdo->prepare('SELECT * FROM quizz WHERE created_by = :user_id');
        $req->execute(['user_id' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Quiz::class);
        
        // Return the quizzes as an array of Quiz objects
        return $req->fetchAll();
    }

    /**
     * Update the details of an existing quiz.
     * 
     * @param string $id The ID of the quiz to update.
     * @param string $title The new title for the quiz.
     * @param string $description The new description for the quiz.
     * 
     * @return bool True if the update was successful, false otherwise.
     */
    public function update($id, $title, $description)
    {
        // Prepare the SQL statement to update the quiz details
        $req = $this->pdo->prepare('UPDATE quizz SET title = :title, description = :description WHERE id = :id');
        
        // Execute the query and return whether it was successful
        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description
        ]);
    }
}
