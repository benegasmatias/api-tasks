<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class PlantMiddleware_AuthUser
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            //problema con token
            return response('unauthenticated.', 401);
        } else if (!in_array(auth()->user()->tipo, [1, 3])) {
            //sino es un director o alumno no entra al sistema
            return response('Unauthorized.', 401);
        } else if (!in_array(auth()->user()->estado, [1, 4])) {
            //la cuenta tiene q estar activa o en cambiar contraseña
            return response('locked.', 401);
        } else {
            return $next($request);
        }
    }
}
