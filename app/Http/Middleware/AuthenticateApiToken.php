<?php

namespace App\Http\Middleware;

use Closure;
use Response;

class AuthenticateApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($request->header('Authorization') == env('API_KEY', 'yWnCVRW26zIJ8aFVv5cV1I4S751095hf')) 
        {
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')){ 
                $data =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $request->getContent()), true);
                $request->request->replace(is_array($data) ? $data : array());
            }
            return $next($request);
        }
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
