<?php

namespace App\Models;

use App\Models\User;
use App\Models\Syllabus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = [
        'study_program_id',
        'creator_user_id',
        'name',
        'code',
        'course_credit',
        'lab_credit',
        'type',
        'short_description',
        'minimal_requirement',
        'study_material_summary',
        'learning_media',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    public function syllabi(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class);
    }
}