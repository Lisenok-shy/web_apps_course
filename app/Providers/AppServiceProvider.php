<?php

namespace App\Providers;

use App\Models\Contract;
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
        Paginator::defaultView('pagination::bootstrap-5');

        Gate::define('confirm_contract',function(User $user)
        {
            return $user->is_admin;
        });

        Gate::define('delete_contract',function(User $user,Contract $contract)
        {
            return !($contract->confirmed);
        });


    }
}
