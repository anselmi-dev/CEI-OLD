<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    protected $hierachy = [
        'superAdmin' =>  4,
        'admin' =>  3,
        'superUser' => 2,
        'user' => 1
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        if ($this->hierachy[$user->role] >= $this->hierachy[$role] ){
            return $next($request);
        }else
            return redirect('/');
    }
}
