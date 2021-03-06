<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'description',
        'favorite',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_like()
    {
        return $this->belongsToMany(User::class, 'user_like');
    }

    public function like()
    {
        return $this->belongsToMany(User::class, 'user_like')->where('user_id', Auth::id());
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
