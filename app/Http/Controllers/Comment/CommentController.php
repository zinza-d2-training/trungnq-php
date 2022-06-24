<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(CommentRequest $request)
    {
        $data = request()->all();
        $data['user_id'] = Auth::id();
        $comment = Comment::create($data);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::with('user_like')->findOrFail($id);
      
        if($request->status == 0){
            $comment->user_like()->attach($request->user_id);
            $comment->favorite = $comment->favorite +1;
        } else {
            $comment->favorite = $comment->favorite -1;
            $comment->user_like()->detach($request->user_id);
        }
        $comment->save();

        return response()->json('true');
    }

    public function destroy($id)
    {
        //
    }
}
