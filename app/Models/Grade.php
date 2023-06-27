<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sections()
    {
        return $this->morphedByMany(Section::class, 'gradable')->withTimestamps();
    }

    public function subjects()
    {
        return $this->morphedByMany(Subject::class, 'gradable')->withTimestamps();
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
