<?php

namespace App\Providers;

use App\Models\PersonalInformation;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');

        app('view')->composer('layouts.web.app', function($view) {
            $app_pi = PersonalInformation::first();
            $app_social_medias = SocialMedia::orderBy('name')->get();
            $canonical = request()->getSchemeAndHttpHost() . request()->getRequestUri();

            $view->with(compact('app_pi', 'app_social_medias', 'canonical'));
        });
    }
}
