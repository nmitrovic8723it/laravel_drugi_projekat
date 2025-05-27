<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user || !$user->role || !in_array($user->role->name, ['admin', 'editor'])) {
            abort(403, 'Nemate pristup ovoj stranici.');
        }
        return $next($request);
    }
}
