<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JoinClass extends Model
{
    protected $fillable = [
        'course_class_id',
        'student_user_id',
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }
}





