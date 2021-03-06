<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        $this->mapMasterRoute();

        $this->mapAdminRoute();

        $this->mapDocRoute();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "master" routes for the application.
     *
     * These routes all receive session state, CSRF protection, masterMiddleware, etc.
     *
     * @return void
     */
    protected function mapMasterRoute()
    {
        Route::middleware('master')
             ->namespace($this->namespace)
             ->group(base_path('routes/master.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, adminMiddleware, etc.
     *
     * @return void
     */
    protected function mapAdminRoute()
    {
        Route::middleware('admin')
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "doc" routes for the application.
     *
     * These routes all receive session state, CSRF protection, docMiddleware, etc.
     *
     * @return void
     */
    protected function mapDocRoute()
    {
        Route::middleware('doc')
             ->namespace($this->namespace)
             ->group(base_path('routes/doc.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
