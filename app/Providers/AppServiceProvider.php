<?php

namespace App\Providers;

use App\Events\FreeSeoAuditEvent;
use App\Listeners\FreeSeoAuditEmailNotofication;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Rate limiting
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Events
        Event::listen(
            Registered::class,
            SendEmailVerificationNotification::class,
        );

        Event::listen(
            FreeSeoAuditEvent::class,
            FreeSeoAuditEmailNotofication::class,
        );
    }
}
