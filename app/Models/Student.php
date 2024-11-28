<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to Major
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
