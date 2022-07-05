<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExpireHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $minutes=config('app.get_url_expire');
        $expire=now()->addMinutes($minutes)->toRfc2822String();
        $response=$next($request);
        $response->header('Expires',$expire);
        return $response;
    }
}
