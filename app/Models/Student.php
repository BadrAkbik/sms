<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable implements MustVerifyEmail
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

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail($this));
    }

    public function accountments()
    {
        return $this->hasMany(Accountment::class);
    }

    public function mothers()
    {
        return $this->belongsToMany(Mother::class, 'student_parent', 'student_id', 'mother_id')->withTimestamps();
    }

    public function fathers()
    {
        return $this->belongsToMany(Father::class, 'student_parent', 'student_id', 'father_id')->withTimestamps();
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function outcomes() 
    {
        return $this->hasMany(Outcome::class);    
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}