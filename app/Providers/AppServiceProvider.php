<?php

namespace App\Providers;

use App\Policies\MoonshineUserPolicy;
use App\Policies\MoonshineUserRolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MoonShine\Laravel\Models\MoonshineUserRole;
use MoonShine\Permissions\Models\MoonshineUser;

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
        Gate::policy(MoonshineUser::class, MoonshineUserPolicy::class);
        Gate::policy(MoonshineUserRole::class, MoonshineUserRolePolicy::class);
    }
}
