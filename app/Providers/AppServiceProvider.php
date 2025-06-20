<?php

namespace App\Providers;


use App\Models\Task;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('pagination::default');

        Gate::define('edit-task', function (User $user, Task $task) {
            return $user->id === $task->user_id;
        });

        Gate::define('destroy-task', function (User $user, Task $task) {
            return $user->id === $task->user_id;
        });
    }
}
