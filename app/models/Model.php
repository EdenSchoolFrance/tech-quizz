<?php

namespace App\models;

class Model
{
    public function getDatabase(): \PDO
    {
        $db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}