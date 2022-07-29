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

use function App\Http\Helpers\responseSuccess;

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
        $lastestPost = $this->dashboardService->getLastestPost();
        return responseSuccess(compact('topusers', 'topics', 'lastestPost'), "true", 200);
    }
}
