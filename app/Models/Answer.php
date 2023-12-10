<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'like_number',
        'question_id',
        'description',
        'owner_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
