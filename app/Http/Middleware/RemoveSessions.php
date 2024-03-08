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
        $now = now();

        // Obtenha a data de hoje à meia-noite
        $midnight = $now->copy()->startOfDay();

        // Calcule o tempo restante até à meia-noite
        $timeUntilMidnight = $midnight->diffInSeconds($now);

        // Configure o tempo de vida da sessão
        config(['session.lifetime' => $timeUntilMidnight]);

        return $next($request);
    }
}
