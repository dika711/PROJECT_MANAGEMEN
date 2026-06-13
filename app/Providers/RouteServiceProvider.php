<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path default setelah login.
     */
    public const HOME = '/dashboard';

    /**
     * Method untuk redirect sesuai role.
     */
    public static function redirectToDashboard()
{
    $user = Auth::user();

    if ($user && $user->role === 'admin') {
        return '/admin/dashboard';
    }

    return '/user/dashboard';
}


    /**
     * Define route bindings, pattern filters, dll.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
