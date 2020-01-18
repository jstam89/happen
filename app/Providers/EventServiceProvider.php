<?php

namespace App\Providers;

use App\Events\NewUserHasRegistered;
use App\Listeners\WelcomeNewUserListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen
        = [
            NewUserHasRegistered::class => [
                WelcomeNewUserListener::class,
            ],
            SocialiteWasCalled::class   => [
                'SocialiteProviders\\Graph\\GraphExtendSocialite@handle',
            ],
        ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
