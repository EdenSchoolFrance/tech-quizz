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

    public function index()
    {
        $userResults = $this->arc->getAll();
        require VIEWS . 'content/admin/result';
    }

    public function show($id)
    {
        $userResult = $this->arc->get($id);
        require VIEWS . 'content/admin/result/' . $id;
    }

}