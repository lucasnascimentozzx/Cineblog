<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticaUsuario
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
        try {
            $token = $request->header('Authorization');
            if(!$token){
                abort(401);
            }
            list(,$token) = explode('Bearer ', $token);

            $user = Usuario::where('api_token', $token)->first();
            if (!$user) {
                abort(401);
            }
            
            Auth::login($user);

            return $next($request);
        } catch (\Throwable $th) {
            abort(401);
        }
    }
}
