<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userAccess {
    public function handle(Request $request, Closure $next, $role): Response {
        if(Auth::check() && Auth::user() -> role == $role){
            return $next($request);
        }
        return response() -> json([
            'status' => 'error',
            'message' => 'Unauthorized'
        ], 403);
    }
}
