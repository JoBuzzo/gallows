<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Session::get('day') != date('z')) {
            Session::put('day', date('z'));
            Session::forget([
                'correctLetters1',
                'correctLetters2',
                'correctLetters4',
                'errorLetters1',
                'errorLetters2',
                'errorLetters4',
                'lifes1',
                'lifes2',
                'lifes4',
            ]);
        }


        return $next($request);
    }
}
