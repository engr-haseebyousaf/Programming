<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role1, string $role2): Response
    {
        echo "<h2 class='text-primary'>ValidUser</h2>";
        echo "<h2 class='text-primary'>{$role1}</h2>";
        echo "<h2 class='text-primary'>{$role2}</h2>";
        if (Auth::check() && in_array(Auth::user()->role,[$role1, $role2])) {
            return $next($request);
        } else {
            return redirect()->route("login")->with("error", "User Role Invalid");
        }
        
    }
}
