<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return response()->json(['success' => true, 'data' => $posts]);
    }

    public function create()
    {
        $tags = Tag::select('name', 'id')->get();
        $topics = Topic::select('title', 'id')->get();

        return response()->json(['success' => true, 'data' => compact('tags', 'topics')]);
    }

    public function store(PostRequest $request)
    {
        $res = $this->postService->create($request->all());
        if ($res) {
            return response()->json(['success' => true, 'data' => "create post success!!!"]);
        }
    }

    public function show($id)
    {
        $data = $this->postService->show($id);

        return response()->json(["success" => true, 'post' => $data['post'], 'comments' => $data['comments']]);
    }

    public function edit($id)
    {
            /*  $tags = Tag::pluck('name', 'id')->toArray();
        $topics = Topic::pluck('title', 'id')->toArray() */;
        $post = $this->postService->getById($id);
        $tagSelected = $post->tag->pluck('id')->toArray();

        return response()->json(["status" => true, "data" => compact('post'/* , 'tags', 'topics', 'tagSelected' */)]);
    }

    public function update(PostRequest $request)
    {
        $data = $request->all();
        $data['id'] = $request->id;
        $this->postService->update($data);

        return response()->json(['success' => 'true', 'content' => 'Thay đổi thông tin thành công']);
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
        return response()->json(['type' => 'info', 'message' => 'Xóa bài đăng thành công!!!']);
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

    public function search(Request $request)
    {
        $posts =  $this->postService->search($request->keyword);

        return view('pages.post.search', compact('posts'));
    }

    public function resolve(Request $request, $id)
    {
        $res = $this->postService->resolve($request->all(), $id);

        return response()->noContent();
    }

    public function pin($id)
    {
        $res = $this->postService->pin($id);

        return response()->noContent();
    }
}
