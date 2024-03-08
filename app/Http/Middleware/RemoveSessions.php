<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveSessions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = time();
        $midnight = strtotime('tomorrow midnight');
        $timeUntilMidnight = $midnight - $now;

        config(['session.lifetime' => $timeUntilMidnight]);

        return $next($request);
    }
}
