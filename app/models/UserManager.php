<?php

namespace App\models;

class UserManager
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
            $id = uniqid();

            $query = "INSERT INTO users (id, username, email, password, role, created_at) 
                      VALUES (:id, :username, :email, :password, :role)";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute([
                ':id' => $id,
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':role' => $role
            ]);

        } catch (\PDOException $e) {
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    public function getUser($username, $password)
    {
        $stmt = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->pdo->prepare($stmt);
        $stmt->execute([':username' => $username]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);

        $user = $stmt->fetch();
}