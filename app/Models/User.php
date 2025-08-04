<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
        'job',
        'description',
        'bio',
        'about',
        'achievements',
        'objective',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(){
        return $this->role === 'admin';
    }

    public function isTeacher(){
        return $this->role === 'teacher';
    }

    public function isStudent(){
        return $this->role === 'student';
    }

    public function profile()
{
    return $this->hasOne(Profile::class);
}

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function cart() {
        return $this->hasOne(Cart::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_user')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function quizzes(){
        return $this->belongsToMany(Quiz::class, 'quiz_user')->withTimestamps()->withPivot('score', 'submitted_at');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }
}