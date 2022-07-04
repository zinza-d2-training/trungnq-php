<?php

namespace App\Services;

use App\Models\Comment;
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
        if (Cache::has('post-lastest')) {
            $postLastest = Cache::get('post-lastest');
        } else {
            $postLastest = Post::orderBy('created_at', 'desc')->limit('5')->get();
            Cache::put('post-lastest', $postLastest, 120);
        }

        return $postLastest;
    }

    public function getTopicWithPost()
    {
        $topics = Topic::withCount('post')
            ->withCount('comments')->with(
                ['post' => function ($query) {
                    $query->withCount('comments')
                        ->orderBy('pin', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->limit('5');
                }]
            )->limit('5');

        if (Cache::has('dashboard')) {
            $topics = Cache::get('dashboard');
        } else {
            $topics = $topics->get();
            Cache::put('dashboard', $topics, 30);
        }

        return $topics;
    }

    public function getTopUser()
    {
        $topusers = Comment::select(DB::raw('SUM(favorite) as totalLike, user_id,name,avatar'))
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->groupBy('user_id')
            ->orderBy('totalLike', 'desc')
            ->limit(5)
            ->get();

        return $topusers;
    }
}
