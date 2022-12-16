<?php

namespace App\Providers;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootEloquentMorphsRelations();
    }

    // vincular relacion polimorfica
    public function bootEloquentMorphsRelations()
    {
        Relation::morphMap([
            // 'thread'=>'App\Models\Thread',
            // 'user'=>'App\Models\User',

            Thread::TABLE => Thread::class,
            User::TABLE => User::class,

        ]);
    }
}
