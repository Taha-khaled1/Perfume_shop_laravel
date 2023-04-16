<?php

namespace App\Http\Middleware;

use App\Models\Discount;
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
        if ($p->actv == 1) {
            return $this->responseFactory->view('site.homePage.erorr_mistance', ['val'=>$p]);
        }

        return $next($request);
    }
}
