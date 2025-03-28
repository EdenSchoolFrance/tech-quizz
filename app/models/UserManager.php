<?php

namespace App\models;

class UserManager extends Model
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


    public function insertUser($username, $email, $password, $role = 'user', $is_active = 1)
    {
        try {
            $stmt = "INSERT INTO users (id, username, email, password, role, is_active) 
                      VALUES (:id, :username, :email, :password, :role, :is_active)";

            $stmt = $this->pdo->prepare($stmt);

            $stmt->execute([
                ':id' => uniqid(),
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':role' => $role,
                ':is_active' => $is_active
            ]);

        } catch (\PDOException $e) {
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    public function getUser($email)
    {
        try {
            $stmt = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($stmt);
            $stmt->execute([':email' => $email]);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

            return $stmt->fetch();
        } catch (\PDOException $e) {
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    public function getAllUsers()
    {
        $stmt = 'SELECT * FROM users';
        $req = $this->pdo->prepare($stmt);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS, User::class);

        return $req->fetchAll();
    }
    
    public function getUserById($id)
    {
        try {
            $stmt = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);
            $stmt->execute([':id' => $id]);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

            return $stmt->fetch();
        } catch (\PDOException $e) {
            return null;
        }
    }
    
    public function updateUser($id, $username, $email, $role, $is_active)
    {
        try {
            $stmt = "UPDATE users SET username = :username, email = :email, role = :role, is_active = :is_active WHERE id = :id, is_active = :is_active";
            $stmt = $this->pdo->prepare($stmt);
            
            return $stmt->execute([
                ':id' => $id,
                ':username' => $username,
                ':email' => $email,
                ':role' => $role,
                ':is_active' => $is_active
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }
    
    public function updateUserWithPassword($id, $username, $email, $password, $role)
    {
        try {
            $stmt = "UPDATE users SET username = :username, email = :email, password = :password, role = :role WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);
            
            return $stmt->execute([
                ':id' => $id,
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':role' => $role
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }
    
    public function deleteUser($id)
    {
        try {
            $stmt = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($stmt);
            
            return $stmt->execute([':id' => $id]);
        } catch (\PDOException $e) {
            return false;
        }
    }
}