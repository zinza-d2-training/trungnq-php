<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        return Post::with('tag')->with('user')->paginate(Config::get('constants.paginate'));
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
        $arr = $post->tag->pluck('id')->toArray();
        $post->tag()->detach($arr);
        $post->tag()->attach($data['tag']);
        $post->update($data);

        return true;
    }
    public function delete($data)
    {
        $post = $this->getById($data);
        $email = $post->user->email;
        Mail::send('email.delete-post', ['post' => $post], function ($message) use ($email) {
            $message->to($email);
            $message->subject('email post');
        });

        return $post->delete();
    }
    public function uploadImage($file)
    {
        $path = '/public/uploads';
        $file_name = $this->imageUpload->savefile($path,$file);

        return $file_name;
    }
}
