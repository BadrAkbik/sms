<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function student() 
    {
        return $this->belongsTo(Student::class);    
    }

    public function subject() 
    {
        return $this->belongsTo(Subject::class);    
    }
}