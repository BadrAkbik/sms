<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
/*         if ($request->user()->getTable() === 'admins'){
            return $next($request);
        } */

        if(! $request->user()->is_approved){
            return response()->json(['message' => 'Your account has not been approved yet.'], 409);
        }
        return $next($request);
    }
}
