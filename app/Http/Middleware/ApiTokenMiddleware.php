<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenServiceInterface;
use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    protected $tokenService;

    /**
     * Create a new middleware instance.
     *
     * @param  \App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenServiceInterface  $tokenService
     * @return void
     */
    public function __construct(TokenServiceInterface $tokenService)
    {
        $this->tokenService = $tokenService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->input('token');

        if (!$this->tokenService->checkToken($token, $request->user())) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
