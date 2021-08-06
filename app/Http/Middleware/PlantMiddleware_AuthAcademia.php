<?php

namespace App\Http\Middleware;
use App\Models\Academia;
use Illuminate\Http\Request;
use Closure;

class PlantMiddleware_AuthAcademia
{
    public function handle(Request $request, Closure $next)
    {
        $academia = Academia::where('estado', 1)->find($request->header('academia'));
        if (!$academia) {
           return response('Error identificando academia', 403);
        }
        $request->academia = $academia;
        return $next($request);
    }
}