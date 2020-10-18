<?php

namespace App\Http\Middleware;

use Closure;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class VerifyJWTToken extends BaseMiddleware
{

    public function handle($request, Closure $next)
    {
        if (!$request->bearerToken()) {
            return responseStatus('Token is not found.', 400);
        }
        try {
           // return   responseData('aa',JWTAuth::parseToken(),200);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return responseStatus('User is not authenticated.', 401);
            }
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return responseStatus('Token is invalid.', 401);
            } elseif ($e instanceof TokenExpiredException) {
                return responseStatus('Token is expired.', 401);
            } else {
                return responseStatus('Something is wrong about the token.', 401);
            }
        }

        return $next($request);

    }
}
