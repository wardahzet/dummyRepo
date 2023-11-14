<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'role',
        'profile_completed',
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(JoinClass::class, 'student_user_id');
    }
    // Define relationships if needed
}