<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BusinessSetting;


class ContentServiceProviderAdmin extends ServiceProvider
{
    public $siteData;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->siteData = BusinessSetting::first();

        view()->composer('admin.layouts.app', function($view) {
            $view->with(['site_data' => $this->siteData]);
        });
    }
}
