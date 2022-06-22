<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Config;
use App\Models\Comment;

class CommentService
{

    public function create($data)
    {
        Comment::create('data');

        return true;
    }

    public function update($data)
    {
        $comment = Comment::findOrFail($data);

        return $comment;
    }
}
