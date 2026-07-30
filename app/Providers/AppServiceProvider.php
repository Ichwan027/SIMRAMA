<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Repositories\NilaiRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \Carbon\Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive(); // tambahkan baris ini
    }
}
