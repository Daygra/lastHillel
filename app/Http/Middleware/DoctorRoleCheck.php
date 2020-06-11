<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;

class DoctorRoleCheck
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
       /* if( Auth::check() == false)
            return redirect()->route('home');*/
        $user=\Auth::user();
        if(!$this->hasRole($user,'doctor'))
            return redirect()->route('home');


        return $next($request);
    }
    private function hasRole(User $user, $role)
    {
        return in_array($role, [$user->role]);
    }


}
