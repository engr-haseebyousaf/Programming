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
        Gate::define("isAdmin", function(User $user){
            return $user->role === "admin";
        });
        Gate::define("isAdminValid", function(User $user, $userId){
            return $user->id === (int) $userId;
        });
        Gate::define("isPostValid", function(User $user, $post_id){
            return $user->id === (int) $post_id;
        });
    }
}
