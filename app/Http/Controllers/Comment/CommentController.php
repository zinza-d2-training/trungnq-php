<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $data = request()->all();
        $data['user_id'] = Auth::id();
        $comment = Comment::create($data);
        $id = $data['post_id'];
        return redirect(route('post.show',['post'=> $id,'page'=>$request->last_page]));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::with('user_like')->findOrFail($id);
        if ($request->status == 0) {
            $comment->user_like()->attach($request->user_id);
            $comment->favorite = $comment->increment('favorite');
        } else {
            $comment->favorite = $comment->decrement('favorite');
            $comment->user_like()->detach($request->user_id);
        }

        return response()->noContent();
    }
}
