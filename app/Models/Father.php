<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_parent', 'father_id', 'student_id')->withTimestamps();
    }
}
