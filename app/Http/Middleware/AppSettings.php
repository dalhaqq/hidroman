<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class AppSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('appSettings')) {
            $settings = json_decode(
                Storage::disk('config')->get('settings.json'), true
            );
            $request->session()->put("appSettings", $settings);
        }

        return $next($request);
    }
}
