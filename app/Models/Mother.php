<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->morphToMany(Student::class, 'parent_student', 'parent_student')->withTimestamps();
    }
}
