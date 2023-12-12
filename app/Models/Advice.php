<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    use HasFactory;
    protected $table = 'advices';

    protected $fillable = [
        'title',
        'creation_date',
        'description',
        'owner_id',
        'like_number'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
