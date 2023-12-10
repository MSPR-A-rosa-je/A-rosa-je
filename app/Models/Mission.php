<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'creation_date',
        'start_date',
        'end_date',
        'owner_id',
        'botanist_id',
        'candidates_list',
        'price',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function botanist()
    {
        return $this->belongsTo(User::class, 'botanist_id');
    }

    protected $casts = [
        'candidates_list' => 'array',
        'creation_date' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
};
