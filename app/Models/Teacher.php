<?php

namespace App\Models;

use App\Classes\QueryFilter;
use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'email_verified_at', 'remember_token', 'created_at', 'updated_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ScopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail($this));
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class)->withTimestamps();
    }
}