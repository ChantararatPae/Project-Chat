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
                ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS'))) //เชื่อมต่อ credentials ใน firebase โดยตรง - แทนที่จะใช้ credentials.file เพื่ออ่านไฟล์ JSON
                ->withDatabaseUri(env('FIREBASE_DATABASE_URL')) //เชื่อมต่อ Database URL ใน firebase โดยตรง - แทนที่จะใช้ credentials.file เพื่ออ่านไฟล์ JSON
                // ->withServiceAccount(config('firebase.credentials'))
                // ->withDatabaseUri(config('firebase.database_url'))
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
