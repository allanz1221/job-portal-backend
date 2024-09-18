<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    protected $fillable = [
        'user_id', 'current_education_level', 'educational_institution', 'university_career',
        'degree_obtained', 'academic_certifications', 'currently_employed', 'current_company',
        'current_position', 'responsibilities_description', 'cv_path', 'cover_letter_path',
        'additional_certifications_path', 'recommendation_letter_path'
    ];

    protected $casts = [
        'currently_employed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
