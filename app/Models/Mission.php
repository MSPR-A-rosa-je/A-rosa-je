<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_sessions',
        'plants_list',
        'creation_date',
        'start_date',
        'end_date',
        'owner_id',
        'gardien_id',
        'candidates_list',
        'price',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function gardien()
    {
        return $this->belongsTo(User::class, 'gardien_id');
    }

    protected $casts = [
        'candidates_list' => 'array',
        'creation_date'   => 'datetime',
        'start_date'      => 'datetime',
        'end_date'        => 'datetime',
    ];
}
