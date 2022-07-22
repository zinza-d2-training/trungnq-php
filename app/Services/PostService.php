<?php

namespace App\Services;

use App\Events\DeletePost;
use App\Listeners\SendEmailToPostAuthor;
use App\Models\Post;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;

class PostService
{
    protected $imageUpload;

    public function __construct(UploadImage $uploadImage)
    {
        $this->imageUpload = $uploadImage;
    }

    public function getById($id)
    {
        return Post::with('tag')->with('topic')->findOrFail($id);
    }

    public function getAll()
    {
        return Post::with('tag')->with('user')->orderBy('created_at', 'desc')->paginate(Config::get('constants.paginate'));
    }

    public function create($data)
    {
        $data['user_id'] = Auth::id();
        $post = Post::create($data);
        if (!empty($data['tag'])) {
            $post->tag()->attach($data['tag']);
        }

        return $post;
    }

    public function update($data)
    {
        $post = $this->getById($data['id']);
        $post->tag()->detach();
        if (isset($data['tag'])) {
            $post->tag()->attach($data['tag']);
        }
        $post->update($data);

        return true;
    }

    public function delete($data)
    {
        $post = $this->getById($data);
        $email = $post->user->email;
        if (Auth::user()->id != $post->user_id) {
            event(new DeletePost($post, $email));
        }
        $post->comments()->delete();
        return $post->delete();
    }

    public function uploadImage($file)
    {
        $path = '/public/uploads';
        $file_name = $this->imageUpload->savefile($path, $file);

        return $file_name;
    }

    public function search($data)
    {
        $result = Post::where('title', 'LIKE', '%' . $data . '%')
            ->withCount('comments')
            ->with('user')
            ->orderBy('pin', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(Config::get('constants.paginate'));

        return $result;
    }

    public function show($id)
    {
        $post = Post::with(['tag', 'user', 'comment_resolve'])->findOrFail($id);

        $comments =  Comment::where('post_id', $post->id)
            ->with(['user', 'user.company', 'like'])
            ->withCount('user_like')
            ->paginate(Config::get('constants.paginate'));

        return compact('post', 'comments', 'id');
    }

    public function resolve($data, $id)
    {

        $post = Post::findOrFail($id);
        if ($post->comment_id == $data['comment_id']) {
            $post->comment_id = null;
            $data['status'] = Post::not_resolve;
        }
        $data['status'] = Post::resolve;

        $post->update($data);
    }

    public function pin($id)
    {
        $post = Post::findOrFail($id);
        $post->pin = !$post->pin;
        $post->update();

        return true;
    }
}
