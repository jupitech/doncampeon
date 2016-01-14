<?php

namespace Doncampeon\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Doncampeon\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      //\Barryvdh\Cors\Middleware\HandleCors::class,
     // \Doncampeon\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Doncampeon\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \Doncampeon\Http\Middleware\RedirectIfAuthenticated::class,
        'role' => \Bican\Roles\Middleware\VerifyRole::class,
      'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
      'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
           'role' => \Bican\Roles\Middleware\VerifyRole::class,
            'permission' => \Bican\Roles\Middleware\VerifyPermission::class,
            'level' => \Bican\Roles\Middleware\VerifyLevel::class,
              'cors' => \Doncampeon\Http\Middleware\Cors::class,
      //  'cors' => \Barryvdh\Cors\Middleware\HandleCors::class, // <<< add this line
    ];
}
