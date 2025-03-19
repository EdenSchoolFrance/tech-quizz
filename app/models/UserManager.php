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


    public function insertUser($username, $email, $password, $role = 'user')
    {
        try {
            $stmt = "INSERT INTO users (id, username, email, password, role) 
                      VALUES (:id, :username, :email, :password, :role)";

            $stmt = $this->pdo->prepare($stmt);

            $stmt->execute([
                ':id' => uniqid(),
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':role' => $role
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
}