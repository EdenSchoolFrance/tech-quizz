<?php

namespace App\controllers;

use App\models\UserManager;
use App\Validator;

class AdminController 
{
    private $um;

    public function __construct()
    {
        $this->um = new UserManager();
    }

    public function index()
    {
        $users = $this->um->getAllUsers();
        require VIEWS . 'content/admin/index.php';
    }
    
    public function editUser($id)
    {
        if (!isset($_SESSION['user']) || user('role') !== 'admin') {
            $_SESSION['error'] = "You need to be an admin!";
            header('Location: /login');
            exit();
        }
        
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        
        unset($_SESSION['error']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
        
        $quizManager = new \App\models\QuizManager();
        $quizzes = $quizManager->getQuizzesByUser($_SESSION['user']->getId());
        
        $users = $this->um->getAllUsers();
        $editUser = $user;
        
        require VIEWS . 'content/admin/index.php';
    }
    
    public function updateUser($id)
    {
        if (!isset($_SESSION['user']) || user('role') !== 'admin') {
            $_SESSION['error'] = "You need to be an admin!";
            header('Location: /login');
            exit();
        }
        
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['role'])) {
            $_SESSION['error'] = "All inputs are required";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
        
        if ($_POST['role'] !== 'user' && $_POST['role'] !== 'admin') {
            $_SESSION['error'] = "Role must be 'user' or 'admin'";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
        
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $role = $_POST['role'];
        
        $result = $this->um->updateUser($id, $username, $email, $role);
        
        if ($result) {
            $_SESSION['success'] = "User updated successfully";
            unset($_SESSION['error']);
            unset($_SESSION['old']);
            
            if (isset($_SESSION['user']) && $_SESSION['user']->getId() === $id) {
                $updatedUser = $this->um->getUserById($id);
                if ($updatedUser) {
                    $_SESSION['user'] = $updatedUser;
                }
            }
            
            header('Location: /dashboard');
            exit();
        } else {
            $_SESSION['error'] = "Error updating user";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
    }
}