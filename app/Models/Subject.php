<?php

namespace App\Models;

use App\Classes\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function ScopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function grade()
    {
        return $this->morphToMany(Grade::class, 'gradable')->withTimestamps();
    }

    public function outcomes() 
    {
        return $this->hasMany(Outcome::class);    
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
