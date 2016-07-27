<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Dingo\Api\Routing\Router as ApiRouter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $adminNamespace = 'App\Http\Controllers\Admin'; //admin controller

    protected $apiNamespace = 'App\Http\Controllers\Api';  // api controllers

    protected $siteNamespace = 'App\Http\Controllers\Site';  // api controllers

    /**
     * This version is applied to the API routes in your routes file.
     *
     * Check dingo/api's documentation for more info.
     *
     * @var string
     */
    protected $version = 'v1';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router, ApiRouter $apiRouter)
    {
        $apiRouter->version($this->version, function ($apiRouter) use ($router) {

            $apiRouter->group(['namespace' => $this->namespace], function ($api) use ($router) {
                $router->group(['namespace' => $this->namespace], function ($router) use ($api) {
                    require app_path('Http/routes.php');
                });
            });

            $apiRouter->group(['namespace' => $this->siteNamespace], function ($api) use ($router) {
                $router->group(['namespace' => $this->siteNamespace], function ($router) use ($api) {
                    require app_path('Http/Routes/routes.site.php');
                });
            });

            $apiRouter->group(['namespace' => $this->adminNamespace], function ($api) use ($router) {
                $router->group(['namespace' => $this->adminNamespace], function ($router) use ($api) {
                    require app_path('Http/Routes/routes.admin.php');
                });
            });
            $apiRouter->group(['namespace' => $this->apiNamespace], function ($api) use ($router) {
                $router->group(['namespace' => $this->apiNamespace], function ($router) use ($api) {
                    require app_path('Http/Routes/routes.api.php');
                });
            });

        });
    }
}
