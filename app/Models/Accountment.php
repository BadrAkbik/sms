<?php

namespace App\Models;

use App\Classes\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountment extends Model
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
}
