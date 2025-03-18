<?php

namespace App\Providers;

use App\Faker\SpecialityProvider;
use App\Faker\DoctorTitleProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Response::macro('success',function($data,$message = "Success",$status = 200){
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ],$status);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        fake()->addProvider(new DoctorTitleProvider(fake()));
        fake()->addProvider(new SpecialityProvider(fake()));

    }
}