<?php

namespace App\controllers;

use App\models\AdminResultManager;

/**
 * Controller handling admin results related actions
 */
class AdminResultController
{
    private $arc;

    /**
     * Initialize AdminResultManager
     */
    public function __construct()
    {
        $this->arc = new AdminResultManager();
    }

    /**
     * Display user results
     * 
     * @param int $id User ID
     * @return void
     */
    public function show($id)
    {
        $userResults = $this->arc->get($id);
        require VIEWS . 'content/admin/result.php';
    }
}
