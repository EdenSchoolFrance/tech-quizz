<?php

namespace App\models;

/**
 * Class responsible for managing results related to the 'user_quizz' table.
 * Handles retrieving quiz results for users from the database.
 */
class AdminResultManager extends Model
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
     * Retrieve all quiz results for all users.
     * 
     * @return Result[] List of Result objects.
     */
    public function getAll()
    {
        // Execute the query to fetch all records from the 'user_quizz' table
        $req = $this->pdo->query('SELECT * FROM user_quizz');
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);

        // Return the results as an array of Result objects
        return $req->fetchAll();
    }

    /**
     * Retrieve quiz results for a specific user by user ID.
     * 
     * @param int $userId The ID of the user whose results are being fetched.
     * 
     * @return Result[] List of Result objects for the specific user.
     */
    public function get($userId)
    {
        // Prepare the SQL statement to fetch results for a specific user
        $stmt = 'SELECT user_quizz.id, score, title, completed_at FROM user_quizz 
                 JOIN quizz ON user_quizz.quizz_id = quizz.id 
                 WHERE user_id = :userId';
        $req = $this->pdo->prepare($stmt);
        $req->execute([':userId' => $userId]);
        $req->setFetchMode(\PDO::FETCH_CLASS, Result::class);
    
        // Return the results as an array of Result objects
        return $req->fetchAll();
    }
}
