<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_replace(' ', '-', strtolower($slug));
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }
}
