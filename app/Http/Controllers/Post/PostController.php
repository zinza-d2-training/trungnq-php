<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Tag;
use App\Models\Topic;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('pages.post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::pluck('name','id')->toArray();
        $topics = Topic::pluck('title','id')->toArray();
        return view('pages.post.create', compact('tags', 'topics'));
    }

    public function store(PostRequest $request)
    {
        $res = $this->postService->create($request->all());
        if ($res) {
            return back()->with('message', ['type' => 'info', 'content' => 'Tạo post thành công']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tags = Tag::pluck('name','id')->toArray();
        $topics = Topic::pluck('title','id')->toArray();
        $post = $this->postService->getById($id);
        $tagSelected = $post->tag->pluck('id')->toArray();

        return view('pages.post.edit', compact('post', 'tags', 'topics', 'tagSelected'));
    }

    public function update(PostRequest $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;
        $this->postService->update($data);

        return back()->with('message', ['type' => 'info', 'content' => 'Thay đổi thông tin thành công']);
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            $file_name = $this->postService->uploadImage($file);
            $url = '/storage/uploads/' . $file_name;

            return response()->json([
                'filename' => $file_name,
                'uploaded' => '1',
                'url' => $url
            ]);
        }
    }
}
