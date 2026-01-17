<?php

namespace App\BussinesLogic\Middlewares;

use Closure;
use Illuminate\Http\Request;

class Fingerprint
{
    public function handle(Request $request, Closure $next)
    {
        $origin = $request->headers->get('origin');

        if ($origin !== config('app.frontend_url') && config('app.frontend_url') !== "*") {
            return response()->json([
                'message' => 'Forbidden'
            ], 403);
        }

        return $next($request);
    }
}