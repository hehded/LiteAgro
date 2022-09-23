<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Controllers\CompanyController;
class EnsureToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    /*public function handle(Request $request, Closure $next)
    {

        if ($request->header('Authorization') == 'Bearer Qpq6EC13vwIFpV8GYCF#') {
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
*/



    // use the id from usertable as token
    /* public function handler(Request $request, Closure $next)
    {
        $user = UserTable::where('token', $request->header('Authorization'))->first();
        if ($user) {
            $request->request->add(['user_id' => $user->id]);
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }*/

    // use the id from database
    public function handle(Request $request, Closure $next)
    {
        // dd(request()->header('Authorization'));
        $user = Users::where('id', $request->header('Authorization'))->first();
        if ($user) {
            $request->attributes->add(['user' => $user]);
            return $next($request);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }
}
