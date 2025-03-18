<?php

namespace App\models;

class RegisterManager
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Erreur de connexion à la base de données: " . $e->getMessage());
        }
    }

    /**
     * Enregistre un nouvel utilisateur dans la bdd
     * 
     * @param User $user L'objet utilisateur à enregistrer
     * @return bool|string True si l'enregistrement a réussi, message d'erreur sinon
     */
    public function register(User $user)
    {
        try {
            // On vérifie si un utilisateur existe déjà
            if ($this->userExists($user->getUsername(), $user->getEmail())) {
                return "Nom d'utilisateur ou email déjà utilisé";
            }

            $id = uniqid();
            
            $query = "INSERT INTO users (id, username, email, password, role, created_at) 
                      VALUES (:id, :username, :email, :password, :role, NOW())";
            
            $stmt = $this->pdo->prepare($query);
            
            $result = $stmt->execute([
                ':id' => $id,
                ':username' => $user->getUsername(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPasswordHash(),
                ':role' => $user->getRole() ?: 'user'
            ]);
            
            return $result ? true : "Erreur lors de l'enregistrement";
            
        } catch (\PDOException $e) {
            return "Erreur de base de données: " . $e->getMessage();
        }
    }

    /**
     * Vérifie si un utilisateur existe déjà
     * 
     * @param string $username Le nom d'utilisateur à vérifier
     * @param string $email L'email à vérifier
     * @return bool True si l'utilisateur existe, false sinon
     */
    private function userExists($username, $email)
    {
        $query = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email
        ]);
        
        return $stmt->fetchColumn() > 0;
    }
}