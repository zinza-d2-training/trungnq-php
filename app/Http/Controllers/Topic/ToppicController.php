<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use App\Services\TopicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Post;

class ToppicController extends Controller
{

    protected $topicService;

    public function __construct(TopicService $topicService)
    {
        $this->topicService = $topicService;
    }

    public function index()
    {
        $topic = $this->topicService->getAll();

        return view('pages.topic.index', compact("topic"));
    }

    public function create()
    {
        return view('pages.topic.create');
    }

    public function store(TopicRequest $request)
    {
        $res = $this->topicService->create($request->all());

        return  back()->with('message', ['type' => 'success', 'content' => 'Thêm thành công 1 topic!!!']);
    }

    public function show($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $listPost =  Post::where('topic_id', $topic->id)
            ->withCount('comments')
            ->orderBy('pin', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(Config::get('constants.paginate'));

        return view('pages.topic.show', compact('topic', 'listPost'));
    }

    public function edit($slug)
    {
        $topic = $this->topicService->getById($slug);

        return view('pages.topic.edit', compact('topic'));
    }

    public function update(Request $request, $slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $data['title'] = $request->title;
        $data['slug'] = $request->title;
        $topic->update($data);

        return  redirect()->route('topic.index')->with('message', ['type' => 'success', 'content' => 'Thay đổi thông tin thành công!!!']);
    }

    public function destroy($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $post = Post::where('topic_id', $topic->id)->delete();

        $topic->delete();
        return $this->message('info', 'Xóa topic thành công!!!');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $topic = Topic::whereIn('id', $ids)->get();
        foreach ($topic as $item) {
            $post = Post::where('topic_id', $item->id)->delete();
            $item->delete();
        }

        return $this->message('info', 'Xóa topic thành công!!!');
    }

    public function message($type, $message)
    {
        return response()->json(['type' => $type, 'message' => $message]);
    }

    public function error()
    {
        return response()->json(['type' => 'danger', 'message' => 'Có lỗi trong quá trình thực hiện.Hãy thử lại']);
    }
}
