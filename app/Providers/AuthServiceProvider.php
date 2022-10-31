<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Beer;
use App\Models\Brewer;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use App\Policies\BeerPolicy;
use App\Policies\BrewerPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\UserPolicy;
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
        Category::class => CategoryPolicy::class,
        Brewer::class => BrewerPolicy::class,
        Beer::class => BeerPolicy::class,
        Review::class => ReviewPolicy::class,
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
        Gate::define('profile-view', [UserPolicy::class, 'view']);
        Gate::define('profile-view', [UserPolicy::class, 'update']);
        Gate::define('profile-view', [UserPolicy::class, 'verify']);
    }
}
