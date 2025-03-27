<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Laravel\Passport\Passport;

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
                ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS'))) //เชื่อมต่อ credentials ใน firebase โดยตรง - แทนที่จะใช้ credentials.file เพื่ออ่านไฟล์ JSON
                ->withDatabaseUri(env('FIREBASE_DATABASE_URL')) //เชื่อมต่อ Database URL ใน firebase โดยตรง - แทนที่จะใช้ credentials.file เพื่ออ่านไฟล์ JSON
                // ->withServiceAccount(config('firebase.credentials')) // ใช้ Firebase Credentials
                // ->withDatabaseUri(config('firebase.database_url')) // ตั้งค่า Database URL
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
        //$this->registerPolicies();
        //Passport::routes();  // Ensure this line is present
    }
}
