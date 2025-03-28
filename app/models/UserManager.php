<?php

namespace App\models;

/**
 * Class responsible for managing user-related operations such as creating,
 * updating, deleting, and retrieving user information from the database.
 */
class UserManager extends Model
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
     * Insert a new user into the database.
     * 
     * @param string $username The username of the user.
     * @param string $email The email of the user.
     * @param string $password The user's password (plain text).
     * @param string $role The role of the user (default is 'user').
     * @param int $is_active The activation status of the user (default is 1).
     * 
     * @return bool True if the user was successfully created, otherwise false.
     */
    public function insertUser($username, $email, $password, $role = 'user', $is_active = 1)
    {
        try {
            // Prepare the SQL statement to insert a new user
            $stmt = "INSERT INTO users (id, username, email, password, role, is_active) 
                      VALUES (:id, :username, :email, :password, :role, :is_active)";

            $stmt = $this->pdo->prepare($stmt);

            // Execute the statement with the provided user data
            $stmt->execute([
                ':id' => uniqid(),
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT), // Secure password hashing
                ':role' => $role,
                ':is_active' => $is_active
            ]);

            return true;

        } catch (\PDOException $e) {
            // Return error message if database query fails
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    /**
     * Retrieve a user from the database by their email.
     * 
     * @param string $email The email of the user.
     * 
     * @return User|null The User object if found, or null if the user doesn't exist.
     */
    public function getUser($email)
    {
        try {
            // Prepare the SQL statement to find a user by email
            $stmt = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($stmt);
            $stmt->execute([':email' => $email]);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

            // Return the user as a User object
            return $stmt->fetch();
        } catch (\PDOException $e) {
            // Return error message if database query fails
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    /**
     * Retrieve all users from the database.
     * 
     * @return User[] List of User objects representing all users.
     */
    public function getAllUsers()
    {
        // Prepare and execute the query to retrieve all users
        $stmt = 'SELECT * FROM users';
        $req = $this->pdo->prepare($stmt);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS, User::class);

        // Return the users as an array of User objects
        return $req->fetchAll();
    }

    /**
     * Retrieve a user by their ID.
     * 
     * @param string $id The ID of the user.
     * 
     * @return User|null The User object if found, or null if the user doesn't exist.
     */
    public function getUserById($id)
    {
        try {
            // Prepare the SQL statement to find a user by ID
            $stmt = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);
            $stmt->execute([':id' => $id]);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

            // Return the user as a User object
            return $stmt->fetch();
        } catch (\PDOException $e) {
            // Return null if user doesn't exist or query fails
            return null;
        }
    }

    /**
     * Update a user's information (username, email, role, and activation status).
     * 
     * @param string $id The ID of the user to be updated.
     * @param string $username The new username of the user.
     * @param string $email The new email of the user.
     * @param string $role The new role of the user.
     * @param int $is_active The new activation status of the user.
     * 
     * @return bool True if the user was successfully updated, otherwise false.
     */
    public function updateUser($id, $username, $email, $role, $is_active)
    {
        try {
            // Prepare the SQL statement to update user information
            $stmt = "UPDATE users SET username = :username, email = :email, role = :role, is_active = :is_active WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);

            // Execute the statement with the updated user data
            return $stmt->execute([
                ':id' => $id,
                ':username' => $username,
                ':email' => $email,
                ':role' => $role,
                ':is_active' => $is_active
            ]);
        } catch (\PDOException $e) {
            // Return false if database query fails
            return false;
        }
    }

    /**
     * Update a user's information, including their password.
     * 
     * @param string $id The ID of the user to be updated.
     * @param string $username The new username of the user.
     * @param string $email The new email of the user.
     * @param string $password The new password for the user.
     * @param string $role The new role of the user.
     * 
     * @return bool True if the user was successfully updated, otherwise false.
     */
    public function updateUserWithPassword($id, $username, $email, $password, $role)
    {
        try {
            // Prepare the SQL statement to update user information, including password
            $stmt = "UPDATE users SET username = :username, email = :email, password = :password, role = :role WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);

            // Execute the statement with the updated user data, including the hashed password
            return $stmt->execute([
                ':id' => $id,
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT), // Secure password hashing
                ':role' => $role
            ]);
        } catch (\PDOException $e) {
            // Return false if database query fails
            return false;
        }
    }

    /**
     * Delete a user from the database.
     * 
     * @param string $id The ID of the user to be deleted.
     * 
     * @return bool True if the user was successfully deleted, otherwise false.
     */
    public function deleteUser($id)
    {
        try {
            // Prepare the SQL statement to delete a user by ID
            $stmt = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);

            // Execute the deletion query
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            // Return false if database query fails
            return false;
        }
    }
}
