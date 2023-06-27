<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetCode extends Model
{
    use HasFactory;

    protected $primaryKey = 'email';

    const UPDATED_AT = null;
    
    protected $fillable = [
        'email',
        'code',
        'created_at',
    ];
    
}
