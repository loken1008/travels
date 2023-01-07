<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveIndexPhp
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
        $searchFor="index.php";
        $strPosition=strpos($request->fullUrl(), $searchFor);
        if ($strPosition!==false) {
            $url= substr($request->fullUrl(), $strPosition+strlen($searchFor));
            return redirect(config('app.url') .$url, 301);
        }
        return $next($request);
    }
}
