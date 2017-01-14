<?php

namespace App\Http\Middleware;

use Route;
use Redirect;
use Closure;
use General;
use Sentinel;
use Request;
use URL;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string    $permission
     * @return mixed
     */
    
    public function handle($request, Closure $next, $permission='')
    {
        if(Sentinel::check()){

        }else{
            return Redirect::route('admin-login');
        }
        if (!sentinel_check_role_admin()) {

            $segment_1 = Request::segment(1);
            $parent = Request::segment(2);
            $segment_3 = Request::segment(3);
            
            try {
                $segment_3 = Request::segment(3);
                $segment_4 = Request::segment(4);
                $segment_5 = Request::segment(5);
                if ($segment_1 == 'admin' && $parent == 'message-center') {
                    if (! empty($segment_3) && empty($segment_4)) {
                        return Redirect::to(URL::to('message-center').'/'.$segment_3);
                    } else {
                        return Redirect::to(URL::to('message-center').'/'.$segment_3.'/'.$segment_4.'/'.$segment_5);
                    }
                } else {
                    return Redirect::route('admin-dashboard-member');
                }
            } catch (Exception $e) {
                
            }
        }

        return $next($request);

    }
}
