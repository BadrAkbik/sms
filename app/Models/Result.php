<?php

namespace App\Models;

use App\Classes\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function ScopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function student() 
    {
        return $this->belongsTo(Student::class);    
    }

    public function exam() 
    {
        return $this->belongsTo(Exam::class);    
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
