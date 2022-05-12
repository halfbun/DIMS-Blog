<?php

namespace App\Providers;

//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;

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
        Paginator::useBootstrap();
        //membuat pagination dengan bootstrap
        //Bootstrap any application services.

        //gate untuk aturan level admin
        Gate::define('admin', function(User $user){
            return $user->is_admin;
        });

    }
}
