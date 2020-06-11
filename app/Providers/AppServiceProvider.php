<?php

namespace App\Providers;


use App\Repositories\DoctorRepository;
use App\Repositories\DoctorRepositoryInterface;
use App\Repositories\PatientRepository;
use App\Repositories\PatientRepositoryInterface;
use App\Services\DoctorService;
use App\Services\DoctorServiceInterface;
use App\Services\PatientService;
use App\Services\PatientServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctorRepositoryInterface::class,DoctorRepository::class);
        $this->app->bind(DoctorServiceInterface::class,DoctorService::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(PatientServiceInterface::class,PatientService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('doctor', function() {
        if (Auth::user()->role =='doctor')
                 return true;
            return false;
        });
    }
}
