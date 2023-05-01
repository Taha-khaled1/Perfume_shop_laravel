<?php

namespace App\Http\Middleware;

use App\Models\Discount;
use App\Models\Notfication;
use App\Models\Order;
use App\Models\Website;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
class MaintenanceMode
{public function __construct(ResponseFactory $responseFactory) 
    {
        $this->responseFactory = $responseFactory;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {       
       
        $p=DB::table('websits')->first();
        $closeTime = Carbon::parse($p->data_time);
        $now = Carbon::now();

        // echo "database". $closeTime->format('Y-m-d H:i') ."---------------------" . $now->format('Y-m-d H:i');
        // if ($closeTime->format('Y-m-d H:i') <= $now->format('Y-m-d H:i') ) {
        //     echo "############################################################";
        // }
        // echo "database". $p->data_time ."---------------------" . $now;
        // echo "database". $closeTime->format('Y-m-d H:i') ."---------------------" . $now->format('Y-m-d H:i');


      if ($p->is_time == 0) {
        if ($closeTime->format('Y-m-d H:i') <= $now->format('Y-m-d H:i') && $p->actv == 0 ) {
            $x=Website::first();
             $x->actv = 1;
             $x->is_time = 1;  
             $x->save();
             }
 
      }
        return $next($request);
    }
}
