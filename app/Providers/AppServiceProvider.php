<?php

namespace App\Providers;

use App\Http\Repositories\Item\ItemInterface;
use App\Http\Repositories\Item\ItemRepository;
use App\Http\Repositories\Period\PeriodInterface;
use App\Http\Repositories\Period\PeriodRepository;
use App\Http\Repositories\Session\SessionInterface;
use App\Http\Repositories\Session\SessionRepository;
use App\Http\Repositories\Table\TableInterface;
use App\Http\Repositories\Table\TableRepository;
use Illuminate\Database\Eloquent\Relations\Relation;
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

//        $this->app->bind('TableService', function ($app){
//            return new TableService($app->make(TableInterface::class));
//        } );

        $this->app->bind(SessionInterface::class, function (){
            return new SessionRepository();
        });

        $this->app->bind(PeriodInterface::class, function (){
            return new PeriodRepository();
        });

        $this->app->bind(ItemInterface::class, function (){
            return new ItemRepository();
        });

        Relation::morphMap([
            'session' => 'App\Models\Session',
            'receipt' => 'App\Models\Receipt',
            'staff' => 'App\Models\Staff'
        ]);

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
