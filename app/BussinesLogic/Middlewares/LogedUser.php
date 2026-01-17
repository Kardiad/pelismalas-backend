<?php

namespace App\BussinesLogic\Middlewares;

use Closure;
use Illuminate\Http\Request;

class LogedUser
{
    public function handle(Request $request, Closure $next)
    {
        //TODO implement logged user check
        if (config('app.user_middleware_enabled')) {
            // Implement actual logged user verification logic here
            $user = $request->user();

            if (!$user) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }

            $token = $user->currentAccessToken();

            if ($token && $token->expires_at) {
                $minutesLeft = now()->diffInDays($token->expires_at, false);

                // Si quedan menos de 5 minutos
                if ($minutesLeft <= 5) {
                    // Header informativo (NO rompe streaming)
                    $response = $next($request);
                    $response->headers->set('X-Token-Expiring', 'true');
                    $response->headers->set('X-Token-Minutes-Left', $minutesLeft);

                    return $response;
                }
            }
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        return $next($request);
    }
}
