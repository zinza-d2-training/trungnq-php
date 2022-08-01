<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use App\Services\TopicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Post;

use function App\Http\Helpers\responseSuccess;

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

        return responseSuccess($topic, "", 200);
    }

    public function create()
    {
        return view('pages.topic.create');
    }

    public function store(TopicRequest $request)
    {
        $res = $this->topicService->create($request->all());

        return responseSuccess($res, "Create topic success", 200);
    }

    public function show($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $listPost =  Post::where('topic_id', $topic->id)
            ->with('user')
            ->withCount('comments')
            ->orderBy('pin', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(Config::get('constants.paginate'));
        $lastesPost = Post::with('user')->orderBy('created_at', 'desc')->limit(5)->get();

        return responseSuccess(compact('topic', 'listPost', 'lastesPost'), "", 200);
    }

    public function edit($slug)
    {
        $topic = $this->topicService->getById($slug);

        return responseSuccess($topic, "", 200);
    }

    public function update(TopicRequest $request)
    {
        $topic = Topic::where('slug', $request->slug)->firstOrFail();
        $data['title'] = $request->title;
        $data['slug'] = $request->title;
        $topic->update($data);

        return responseSuccess($topic, "Update topic success", 200);
    }

    public function destroy($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        $post = Post::where('topic_id', $topic->id)->delete();

        $topic->delete();
        return responseSuccess(null, "Delete topic successfully", 200);
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

        return responseSuccess(null, "Delete topic successfully", 200);
    }
    public function lastesTopic()
    {
        $topics = Topic::with(
            ['post' => function ($query) {
                $query->with('user')
                    ->orderBy('pin', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->limit('5');
            }]
        )->orderBy('created_at', 'desc')->limit('5')->get();

        return responseSuccess($topics, "", 200);
    }
}
