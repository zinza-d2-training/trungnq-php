<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Config;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    public function getLastestPost()
    {
        $postLastest = Post::orderBy('created_at', 'desc')->limit('5');

        if (Cache::has('post-lastest')) {
            $postLastest = Cache::get('post-lastest');
        } else {
            $postLastest =  $postLastest->get();
            Cache::put('post-lastest', $postLastest, 300);
        }

        return $postLastest;
    }

    public function getTopicWithPost()
    {
        $topics = Topic::withCount('post')->withCount('comments')->with(
            ['post' => function ($query) {
                $query->withCount('comments')->orderBy('created_at', 'desc')->limit('5');
            }]
        );

        if (Cache::has('dashboard')) {
            $topics = Cache::get('dashboard');
        } else {
            $topics = $topics->get();
            Cache::put('dashboard', $topics, 300);
        }

        return $topics;
    }

    public function getTopUser()
    {
        $topusers = DB::table('comments')
            ->select(DB::raw('SUM(favorite) as tongluotlike, user_id,name,avatar'))
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->groupBy('user_id')
            ->orderBy('tongluotlike', 'desc')
            ->limit(5)
            ->get();

        return $topusers;
    }
}