<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    
    const resolve = 1;
    const not_resolve = 0;


    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status',
        'topic_id',
        'comment_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function comment_resolve(){
        return $this->hasOne(Comment::class,'id','comment_id');
    }
}
