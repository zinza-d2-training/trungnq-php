<?php

namespace App\Providers;

use App\Models\Topic;
use App\Models\User;
use App\Observers\AccountObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $listTopic = Topic::pluck('title', 'slug')->toArray();
        View::share('listTopic', $listTopic);

        Paginator::defaultView('');
 
        Paginator::defaultSimpleView('view-name');
    }
}
