<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RedirectIfApiAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->auth = $auth;

        $this->user = $user;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( empty($request->header('AuthToken')) ) {
            return response()->json([
                'message' => 'you need to be authenticated'
            ], 407);
        }

        try {
            // $tenant = $this->tenant->where('bearer_token', $request->header('AuthorizationHeader'))->firstOrFail();

            $this->auth->login( $this->user->where('auth_token', $request->header('AuthToken'))->firstOrFail() );
            return $next($request);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'bad request, seems your token expired or invalid'
            ], 407);
        }
    }
}
