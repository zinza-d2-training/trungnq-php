<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\User;
use App\Models\Post;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $dashboardService;

    public function __construct(DashboardService $service)
    {
        $this->dashboardService = $service;
    }

    public function index()
    {
        $topusers = $this->dashboardService->getTopUser();
        $topics = $this->dashboardService->getTopicWithPost();
        return response()->json(compact('topics', 'topusers'),200);
        return view('pages.dashboard', compact('topics', 'topusers'));
    }
}
