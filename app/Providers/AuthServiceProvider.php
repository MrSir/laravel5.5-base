<?php

namespace App\Providers;

use App\Models\Element;
use App\Models\Page;
use App\Models\Site;
use App\Models\User;
use App\Policies\ElementPolicy;
use App\Policies\PagePolicy;
use App\Policies\SitePolicy;
use App\Policies\UserPolicy;
use App\Services\AuthGuard;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Site::class => SitePolicy::class,
        Page::class => PagePolicy::class,
        Element::class => ElementPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider(
            'users.weebly',
            function () {
                return new UserProvider(
                    new BcryptHasher(),
                    new User()
                );
            }
        );

        Auth::extend(
            'auth.weebly',
            function () {
                return new AuthGuard(
                    new UserProvider(
                        new BcryptHasher(),
                        new User()
                    ),
                    $this->app['request']
                );
            }
        );
    }
}
