<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        /**
         * Define se o user pode criar um post
         */
        Gate::define('create-post', function (User $user) {
            return $user->role === 'admin' || $user->role === 'normal_user';
        });

        /**
         * Define se o user pode deletar um post
         */
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->role === 'admin' || $user->id === $post->user_id;
        });
    }
}
