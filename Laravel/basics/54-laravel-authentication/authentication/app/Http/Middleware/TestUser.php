<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "<h2 class='text-danger'>TestUser</h2>";
        return $next($request);
    }
    public function terminate(Request $request, Response $response){
        echo "<h2 class='text-success'>This is the after response</h2>";
    }
}
