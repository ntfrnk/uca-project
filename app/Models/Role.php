<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers')->withPivot('course_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teachers')->withPivot('user_id');
    }

}
