<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BusinessSetting;

class ContentServiceProvider extends ServiceProvider
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

        view()->composer('front.layout.app', function($view) {
            $view->with(['site_data' => $this->siteData]);
        });
        view()->composer('front.pages.contact-us', function($view) {
            $view->with(['site_data' => $this->siteData]);
        });
    }
}
