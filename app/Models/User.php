<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var string[]
     */
    protected $fillable = [
        'login',
        'full_name',
        'email',
        'password',
        'region',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'password_reset_token',
        'avatar_name',
    ];

    /**
     * The attributes that should be cast.
     * @var array
     */
    protected $casts = [
        'login' => 'string',
        'full_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'region' => 'string',
    ];

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}