<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'title',
        'description',
        'creation_date',
        'owner_id'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class, 'answer_question', 'question_id', 'answer_id');
    }
}