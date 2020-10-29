<?php

namespace App\Providers;

use App\Http\Controllers\API\SessionController;
use App\Http\Repositories\Session\SessionInterface;
use App\Http\Repositories\Session\SessionRepository;
use App\Http\Repositories\Table\TableInterface;
use App\Http\Repositories\Table\TableRepository;
use App\Http\Services\Session\SessionService;
use App\Http\Services\Table\TableService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TableInterface::class, function (){
            return new TableRepository();
        });

        $this->app->bind('TableService', function ($app){
            return new TableService($app->make(TableInterface::class));
        } );

        $this->app->bind(SessionInterface::class, function (){
            return new SessionRepository();
        });

//        $this->app->bind('SessionService', function ($app){
//            return new SessionService($app->make(SessionInterface::class));
//        } );
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
