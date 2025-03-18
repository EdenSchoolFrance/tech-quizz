<?php

namespace App\controllers;

use App\models\RegisterManager;
use App\models\User;

class RegisterController
{
    private $registerManager;

    public function __construct()
    {
        $this->registerManager = new RegisterManager();
    }

    /**
     * Affiche le formulaire d'inscription
     */
    public function showRegisterForm()
    {
        require VIEWS . 'auth/register.php';
    }

    /**
     * Gère le formulaire
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /register');
            exit;
        }

        // On récupère les données du formulaire
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // On valide les données
        $errors = [];

        if (empty($username)) {
            $errors[] = "Le nom d'utilisateur est requis";
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Une adresse email valide est requise";
        }

        if (empty($password)) {
            $errors[] = "Le mot de passe est requis";
        } elseif (strlen($password) < 8) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
        }

        if ($password !== $confirmPassword) {
            $errors[] = "Les mots de passe ne correspondent pas";
        }

        if (!empty($errors)) {
            $_SESSION['register_errors'] = $errors;
            $_SESSION['register_data'] = [
                'username' => $username,
                'email' => $email
            ];
            header('Location: /register');
            exit;
        }

        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPasswordHash(password_hash($password, PASSWORD_DEFAULT));
        $user->setRole('user');

        $result = $this->registerManager->register($user);

        if ($result === true) {
            // Si ca reussit 
            $_SESSION['success_message'] = "Success!";
            header('Location: /login');
            exit;
        } else {
            // S'il y a une erreur
            $_SESSION['register_errors'] = [$result];
            $_SESSION['register_data'] = [
                'username' => $username,
                'email' => $email
            ];
            header('Location: /register');
            exit;
        }
    }
}