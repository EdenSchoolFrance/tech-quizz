<?php

namespace App\controllers;

use App\models\QuizManager;
use App\models\UserManager;

class AdminController 
{
    private $um;
    private $qc;

    public function __construct()
    {
        $this->um = new UserManager();
        $this->qc = new QuizManager();
    }

    public function index()
    {
        $quizzes = $this->qc->getAll();

        $userManager = new \App\models\UserManager();
        $users = $userManager->getAllUsers();

        require VIEWS . 'content/admin/index.php';
    }
    
    public function users()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'admin') {
            $_SESSION['error'] = "You don't have permission to access this page";
            header('Location: /');
            exit();
        }
        
        $users = $this->um->getAllUsers();
        
        require VIEWS . 'content/admin/users.php';
    }
    
    public function editUser($id)
    {
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        
        unset($_SESSION['error']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
        
        $editUser = $user;
        require VIEWS . 'content/admin/edit-user.php';
    }
    
    public function updateUser($id)
    {
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

    public function deleteUser($id)
    {
        if ($_SESSION['user']->getId() === $id) {
            $_SESSION['error'] = "You cannot delete your own account!";
            header('Location: /dashboard');
            exit();
        }
        
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        
        $result = $this->um->deleteUser($id);
        
        if ($result) {
            $_SESSION['success'] = "User deleted successfully";
        } else {
            $_SESSION['error'] = "Error deleting user";
        }
        
        header('Location: /dashboard');
        exit();
    }
    
    public function createUser()
    {
        unset($_SESSION['error']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
        
        require VIEWS . 'content/admin/create-user.php';
    }
    
    public function storeUser()
    {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role'])) {
            $_SESSION['error'] = "All inputs are required";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
        
        if ($_POST['role'] !== 'user' && $_POST['role'] !== 'admin') {
            $_SESSION['error'] = "Role must be 'user' or 'admin'";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
        
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $existingUser = $this->um->getUser($email);
        if ($existingUser) {
            $_SESSION['error'] = "Email already exists";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
        
        $result = $this->um->insertUser($username, $email, $password, $role);
        
        if ($result) {
            $_SESSION['success'] = "User created successfully";
            unset($_SESSION['error']);
            unset($_SESSION['old']);
            header('Location: /dashboard');
            exit();
        } else {
            $_SESSION['error'] = "Error creating user";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
    }
}