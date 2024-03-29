<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'is_botanist',
        'is_admin',
        'creation_date',
        'botanist_since',
        'pseudo',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'birth_date',
        'url_picture',
        'password',
        'address_id'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_admin'       => 'boolean',
        'is_botanist'    => 'boolean',
        'creation_date'  => 'datetime',
        'botanist_since' => 'datetime',
        'birth_date'     => 'datetime',
    ];

    protected $dates = [
        'creation_date',
        'botanist_since',
        'birth_date',
    ];


    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function plant()
    {
        return $this->hasMany(Plant::class, 'owner_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->creation_date = Carbon::now();
            $user->is_botanist = $user->is_botanist ?? false;
            $user->is_admin = $user->is_admin ?? false;
        });

        static::deleting(function ($user) {
            $user->address()->delete();
            $user->plant()->delete();
        });
    }
}
