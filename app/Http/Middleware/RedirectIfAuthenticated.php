<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        //dd($request->all());
        //$cuenta=$request->login;
        //echo "SIIII=". $cuenta;
       // $cuenta = "'".$cuenta."'";
        //echo "SIIII=". $cuenta;
        //dd($cuenta);
        if (Auth::guard($guard)->check()) {

            $user = User::where('cuenta','.$request->login.')->get();
            dd($user);
            /*if ($user->role =='student'){
                return redirect('/students/panel');
            }else{
                return redirect('/home');
            }*/
           
        }

        return $next($request);
    }
}
