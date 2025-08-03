<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->user()->role !== $role) {
            // If the user does not have the required role, redirect or abort
            return redirect('/')->with('error', 'You do not have access to this page.');
            // Alternatively, you can use abort(403) to deny access
            // abort(403, 'Unauthorized action.');

        }
        return $next($request);
    }
}
