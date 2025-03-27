<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $fillable = ['quiz_id', 'score', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
