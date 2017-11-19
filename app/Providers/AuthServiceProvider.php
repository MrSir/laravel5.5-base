<?php

namespace App\Providers;

use App\Models\Element;
use App\Models\Page;
use App\Models\Site;
use App\Policies\ElementPolicy;
use App\Policies\PagePolicy;
use App\Policies\SitePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * @var array
     */
    protected $policies = [
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
        //
    }
}
