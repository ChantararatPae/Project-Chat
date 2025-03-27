<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Database::class, function ($app) {
            return (new Factory)
                //->withServiceAccount(config('firebase.credentials')) // ใช้ Firebase Credentials
                ->withServiceAccount(config('C:\xampp\htdocs\Project_Chat\example-app\config\firebase_credentials.json'))
                ->withDatabaseUri(config('firebase.database_url')) // ตั้งค่า Database URL
                ->createDatabase();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()//: void
    {
        //
    }
}
