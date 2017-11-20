<?php

namespace App\Http\Middleware;

use App\Models\Token;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

/**
 * Class Authenticate
 * @package App\Http\Middleware
 */
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tokenValue = $request->header('authorization');

        // find token
        $token = Token::whereToken($tokenValue)
            ->first();

        if ($token) {
            $now = Carbon::now();

            if ($now->greaterThan($token->expires_at)) {
                return response()
                    ->json(['message' => 'Token has expired'])
                    ->setStatusCode(403);
            }
        } elseif (is_null($token)) {
            return response()
                ->json(['message' => 'No Token'])
                ->setStatusCode(401);
        }

        return $next($request);
    }

}