<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Riari\Forum\Models\Post;
use Riari\Forum\Models\Thread;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Post::observe("Riari\\Forum\\Models\\Observers\\PostObserver");
        Thread::observe("Riari\\Forum\\Models\\Observers\\ThreadObserver");
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
