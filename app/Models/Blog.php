<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }


     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // protected static function booted(){
    //     static::creating(function ($blog) {
    //         $blog->slug = Str::random(10);
    //     });
    // }

}