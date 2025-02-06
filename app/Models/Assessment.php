<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assessment_date',
        'qualification',
        'qualification2',
        'no_of_pax',
        'no_of_pax2',
	'training_status',
    'training_status2',
        'type_of_scholar',
        'type_of_scholar2',
	'status',
        'eltt',
        'eltt2',
        'rfftp',
        'rfftp2',
        'oropfafns',
        'oropfafns2',
        'sopcctvr',
        'sopcctvr2',
    ];

    /**
     * Get the user who created the assessment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
