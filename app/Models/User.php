<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'users';
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'subscriptions');
    }

    public function coursesRoles()
    {
        return $this->belongsToMany(Role::class, 'teachers')->withPivot('course_id');
    }

    public function coursesToTeach()
    {
        return $this->belongsToMany(Course::class, 'teachers')->withPivot('role_id');
    }

    // Mutators

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
}
