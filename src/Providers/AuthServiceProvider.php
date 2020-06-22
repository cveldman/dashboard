<?php

namespace Veldman\Dashboard\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\User' => 'Veldman\Dashboard\Policies\UserPolicy',
        'Veldman\Dashboard\Models\Role' => 'Veldman\Dashboard\Policies\RolePolicy',
    ];

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->registerPolicies();
    }
}
