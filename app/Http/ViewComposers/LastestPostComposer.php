<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
use Illuminate\View\View;

class LastestPostComposer
{
    public $postList;
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->postList = Post::with('user')->orderBy('created_at','desc')->limit(5)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latestPost', $this->postList);
    }
}
