<?php

namespace App\Http\Middleware;

use Closure;
use App\Member;
use Illuminate\Support\Facades\Auth;

class Access
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
        if($request->route('group')){
            try {
                $group_id = $request->route('group')->id;
            } catch (\Throwable $th) {
                $group_id = $request->route('group');
            }
        }elseif($request->route('content')){
            $group_id = $request->route('content')->group_id;
        }elseif ($request->route('board')) {
            $group_id = $request->route('board')->group_id;
        }elseif ($request->group){
            $group_id = $request->group;
        }
        $membership = Member::where('group_id', $group_id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if(!$membership){
            return redirect(route('admin.dashboard'));
        }
        return $next($request);
    }
}
