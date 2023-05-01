<?php

namespace App\Http\Middleware;

use App\Models\Notfication;
use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        $orderss = Order::where('status','5')->get();
        foreach ($orderss as  $o) {
            
            if ($o->payment->status=='completed') {
                $r=Order::find($o->id);
                $r->status=1;
                $r->save();
        
                $noty = new Notfication();
        
                $noty->title="طلب جديد";
                $user = auth()->user();
                if ($user) {
                    $name = $user->fname;
                    $noty->message="تم انشاء طلب جديد بواسطة ".$name ??"لم يتم ادخال الاسم" ;
                }else{
                    $noty->message="تم انشاء طلب جديد بواسطة "."لم يتم ادخال الاسم" ;
                }
                $noty->save();
              
            }
        }  



        return $next($request);
    }
}
