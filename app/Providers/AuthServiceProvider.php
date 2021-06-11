<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin',function ($user){
            return $user->role == 'admin' ;
        });

         Gate::define('isCashier',function ($user){
             return $user->role == 'cashier' ;
         });

//        Gate::define('isAccountant',function ($user){
//            return $user->role == 'accountant' ;
//        });

        Gate::define('isKitchenStaff',function ($user){
            return (($user->role == 'kitchen_staff') ||  ($user->role == 'bar_staff') ) ;
        });
    }
}
