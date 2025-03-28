<?php

namespace App\controllers;

use App\models\QuizManager;
use App\models\UserManager;
use App\Validator;

class AdminController 
{
    private $um;
    private $qc;
    private $validator;

    public function __construct()
    {
        $this->um = new UserManager();
        $this->qc = new QuizManager();
        $this->validator = new Validator();
    }

    /**
     * Display the admin dashboard with quizzes and users
     * 
     * @return void
     */
    public function index()
    {
        $quizzes = $this->qc->getAll();

        $userManager = new \App\models\UserManager();
        $users = $userManager->getAllUsers();

        require VIEWS . 'content/admin/index.php';
    }
    
    /**
     * Display the user list (only for admin)
     * 
     * @return void
     */
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
    
    /**
     * Display the edit user form
     * 
     * @param int $id user ID
     * @return void
     */
    public function editUser($id)
    {
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        
        $editUser = $user;
        require VIEWS . 'content/admin/edit-user.php';
    }
    
    /**
     * Processes the update user form submission
     * 
     * @param int $id user ID
     * @return void
     */
    public function updateUser($id)
    {
        $user = $this->um->getUserById($id);
        
        if (!$user) {
            $_SESSION['error'] = "User not found";
            header('Location: /dashboard');
            exit();
        }
        $_SESSION['old'] = $_POST;

        $this->validator->validate([
            'username' => ['max:255', 'required', 'alpha'],
            'email' => ['max:255', 'required', 'email']
        ]);

        if($this->validator->errors()) {
            header('Location: /dashboard/user/edit/' . $id);
        }

        if ($_POST['role'] !== 'user' && $_POST['role'] !== 'admin') {
            $_SESSION['error'] = "Role must be 'user' or 'admin'";
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }

        if ($_POST['is_active'] !== '1' && !empty($_POST['is_active']) ) {
            $_SESSION['error'] = "User must be 'active' or 'inactive'";
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
        
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $role = $_POST['role'];
        $is_active = $_POST['is_active'];
        
        $result = $this->um->updateUser($id, $username, $email, $role, $is_active);
        
        if ($result) {
            $_SESSION['success'] = "User updated successfully";
            header('Location: /dashboard/user');
            exit();
        } else {
            $_SESSION['error'] = "Error updating user";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/edit/' . $id);
            exit();
        }
    }

    /**
     * Delete a user
     * 
     * @param int $id user ID
     * @return void
     */
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
        
        header('Location: /dashboard/user');
        exit();
    }
    
    /**
     * Display the create user form
     * 
     * @return void
     */
    public function createUser()
    {
        require VIEWS . 'content/admin/create-user.php';
    }
    
    /**
     * Processes the create user form submission
     * 
     * @return void
     */
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
            header('Location: /dashboard/user');
            exit();
        } else {
            $_SESSION['error'] = "Error creating user";
            $_SESSION['old'] = $_POST;
            header('Location: /dashboard/user/create');
            exit();
        }
    }
}
