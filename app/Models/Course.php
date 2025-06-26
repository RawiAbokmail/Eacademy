<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')->withTimestamps();
    }

    public function reviews()
    {
      return $this->morphMany(Review::class, 'target');
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
}
