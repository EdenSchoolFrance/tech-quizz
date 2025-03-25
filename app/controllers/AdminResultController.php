<?php

namespace App\controllers;

use App\models\AdminResultManager;


class AdminResultController
{
    private $arc;

    public function __construct()
    {
        $this->arc = new AdminResultManager();
    }

    public function show($id)
    {
        $userResults = $this->arc->get($id);
        require VIEWS . 'content/admin/result.php';
    }

}