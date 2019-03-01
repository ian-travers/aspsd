<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-panel', function (User $user) {
            return $user->isSA();
        });

        Gate::define('nsi-panel', function (User $user) {
            return $user->isSA() || $user->isNSI() || $user->isProjector();
        });

        Gate::define('projector-panel', function (User $user) {
            return $user->isSA() || $user->isProjector();
        });

        Gate::define('projects-frontend', function (User $user) {
            return $user->isSA() || $user->isUser() || $user->isVerifier();
        });

        Gate::define('users-frontend', function (User $user) {
            return $user->isSA() || $user->isVerifier();
        });

        Gate::define('project-detail', function (User $user) {
            return $user->isSA() || $user->isVerifier();
        });
    }
}
