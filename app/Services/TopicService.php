<?php

namespace App\Services;

use App\Models\Topic;
use Illuminate\Support\Facades\Config;

class TopicService
{

    public function getAll()
    {
        return Topic::withCount('post')->paginate(Config::get('constants.paginate'));
    }

    public function getById($slug)
    {
        $topic = Topic::where('slug', $slug)->firstOrFail();
        return $topic;
    }

    public function create($data)
    {
        $data['slug'] = $data['title'];
        $topic = Topic::create($data);
        return $topic;
    }
}
