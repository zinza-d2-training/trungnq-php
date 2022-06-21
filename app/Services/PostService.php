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
        $post->tag()->detach();
        if(isset($data['tag'])){
            $post->tag()->attach($data['tag']);
        }
        $post->update($data);

        return true;
    }
    public function delete($data)
    {
        $post = $this->getById($data);
        $email = $post->user->email;
        event(new DeletePost($post,$email));
      
        return $post->delete();
    }
    public function uploadImage($file)
    {
        $path = '/public/uploads';
        $file_name = $this->imageUpload->savefile($path, $file);

        return $file_name;
    }
}
