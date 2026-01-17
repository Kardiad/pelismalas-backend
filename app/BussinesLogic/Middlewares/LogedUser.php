<?php

namespace App\BussinesLogic\Middlewares;

use Closure;
use Illuminate\Http\Request;

class LogedUser
{
    public function handle(Request $request, Closure $next)
    {
        //TODO implement logged user check
        if(config('app.user_middleware_enabled')){
            // Implement actual logged user verification logic here
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        return $next($request);
    }
}