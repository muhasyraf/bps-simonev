<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateAuth;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        GateAuth::define('admin-action', function (User $user) {
            return $user->role_id == 1;
        });
        GateAuth::define('user-action', function (User $user) {
            return $user->role_id == 2;
        });
    }
}
