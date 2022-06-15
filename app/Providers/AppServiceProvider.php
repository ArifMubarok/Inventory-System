<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(255);
        // global settings via config
        // config([
        //     'settings' => Setting::all([
        //         'name', 'value'
        //     ])
        //         ->keyBy('name')
        //         ->transform(function ($setting) {
        //             return $setting->value;
        //         })
        //         ->toArray()
        // ]);
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');
    }
}
