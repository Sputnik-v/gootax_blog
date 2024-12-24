<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('UserCount', User::query()->count());
        view()->share('PostCount', Post::query()->count());
        view()->share('CommentCount', Comment::query()->count());

        \Illuminate\Support\Facades\View::composer('admin*', function (View $view){
            $view->with('admin', Auth::user());
        });
    }
}
