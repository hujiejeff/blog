<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class VisitedRecord
{
    public function handle($request,Closure $next)
    {
        return $next($request);
    }
}