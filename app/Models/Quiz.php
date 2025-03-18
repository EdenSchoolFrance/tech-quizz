<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz'; // Indique à Laravel que la table s'appelle "quiz"

    protected $fillable = ['ID_QUIZ', 'NAME_QUIZ'];
}
