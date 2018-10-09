<?php

namespace App\Http\Middleware;

use App\Models\SocialUser;

use Closure;

class SourceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $source)
    {
        $class = 'App\Scopes\\' . $source . 'Scope';
        SocialUser::addGlobalScope(new $class);

        return $next($request);
    }
}
