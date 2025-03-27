<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(Firebase::class, function () {
            $firebase = (new \Kreait\Firebase\Factory())
                //->withServiceAccount(config('firebase.credentials'))
                ->withServiceAccount(config('C:\xampp\htdocs\Project_Chat\example-app\config\firebase_credentials.json'))
                ->create();

            return $firebase;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
