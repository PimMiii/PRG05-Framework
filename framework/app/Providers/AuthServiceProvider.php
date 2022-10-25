<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\User;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-view', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('profile-view', function (User $user, User $profile) {
           return $user->id === $profile->id;

        });
        Gate::define('profile-edit', function (User $user, User $profile) {
            return $user->id === $profile->id;
        });
        Gate::define('profile-verify', function (User $user, User $profile) {
            return $user->id === $profile->id;
        });
    }
}
