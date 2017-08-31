<?php
/**
 * Created by PhpStorm.
 * User: hujie
 * Date: 17-7-12
 * Time: 下午6:53
 */

namespace App\Http\Middleware;

use Closure;

class Activity
{
    public function handle($request,Closure $next)
    {
        if(time()<strtotime('2017-07-01')){
            return redirect('activity0');
        }

        return $next($request);
    }
}