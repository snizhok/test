<?php

namespace App\Providers;

use App\UserProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Auth::provider('file', function ($app, array $config) {
            return new UserProvider();
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(config_path('users.php'), 'users');
    }
}
