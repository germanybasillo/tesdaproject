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
        'qualification1',
        'qualification2',
        'qualification3',
        'qualification4',
        'no_of_pax1',
        'no_of_pax2',
        'no_of_pax3',
        'no_of_pax4',
	'training_status1',
    'training_status2',
    'training_status3',
    'training_status4',
        'type_of_scholar1',
        'type_of_scholar2',
        'type_of_scholar3',
        'type_of_scholar4',
	'status',
        'eltt1',
        'eltt2',
        'eltt3',
        'eltt4',
        'rfftp1',
        'rfftp2',
        'rfftp3',
        'rfftp4',
        'oropfafns1',
        'oropfafns2',
        'oropfafns3',
        'oropfafns4',
        'sopcctvr1',
        'sopcctvr2',
        'sopcctvr3',
        'sopcctvr4',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
