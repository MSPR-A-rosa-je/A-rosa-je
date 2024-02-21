<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'creation_date',
        'plant_list',
        'owner_id',
        'mission_id',
        'note',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class, 'mission_id');
    }
}
