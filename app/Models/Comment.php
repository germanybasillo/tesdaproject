<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment']; // Add user_id here

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
