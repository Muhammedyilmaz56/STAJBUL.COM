<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;



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
            // Session timeout'u veritabanından dinamik olarak ayarla
            $timeoutSetting = Setting::where('key', 'session_timeout')->first();
        
            if ($timeoutSetting) {
                Config::set('session.lifetime', (int)$timeoutSetting->value);
            }
    }
}
