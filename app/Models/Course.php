<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'teachers')->withPivot('user_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers')->withPivot('role_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }
    
}
