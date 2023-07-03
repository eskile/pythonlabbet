<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::id();
        $is_teacher = false;
        if($id) {
            $settings = DB::table('user_settings')->where('user_id', $id)->first();
            $is_teacher = DB::table('users')->where('id', $id)->pluck('is_teacher')->first();
        }
        if( $id && $settings ) {
            $request->session()->put('easy_mode', $settings->easy_mode);
            $request->session()->put('show_solutions', $settings->show_solutions);
            $request->session()->put('show_videos', $settings->show_videos);
        }
        else {
            $request->session()->put('easy_mode', false);
            $request->session()->put('show_solutions', false);
            $request->session()->put('show_videos', true);
        }
        if($is_teacher)
            $request->session()->put('show_solutions', true);

        return $next($request);
    }
}
