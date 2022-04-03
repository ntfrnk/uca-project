<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher');
    }
    
}
