<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Models\Notfication;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $date = Carbon::now()->subHour(12);
        $orders = Order::where('status','1')->get()->count();
        $orderstoday = Order::where('created_at', '<=', $date)->get()->count();
        $orderssh = Order::where('status','2')->get()->count();
        $prducts = Product::get()->count();
        $prductsem = Product::where('quantity',0.00)->get()->count();
        $users = User::get()->count();
        $webclose=Website::first(); 
     
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
        }   $n=   Notfication::all();
        return view('admin.home.index', [
            'orders' => $orders,       
            'orderstoday' => $orderstoday,       
            'orderssh' => $orderssh,       
            'prducts' => $prducts,       
            'users' => $users,
            'prductsem' => $prductsem,  'notf'=>$n,
            'webclose'=>$webclose     
        ]); 
    }
    public function contact(){
        
        $contact = Contact::latest()->get();
        $n=   Notfication::all();
        return view('admin.contact.index', [
            'contact' => $contact,  'notf'=>$n,     
        ]);
    }
    public function delete_contact(Request $request){

        $contact = Contact::find($request->id);  
        if( $contact){

            $contact->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }


 public function updatewebsite(Request $request)
{
    $website = Website::first();
    if ($request->maintenance_mode == "true") {
        $website->actv = 1;
    } else {
        $website->actv = 0;
    }
    $website->Description_ar = $request->description_ar??"";
    $website->Description_en = $request->description_en??"";
    // if (has) {
        $website->data_time = $request->data_time??"2023-04-30T01:54";
    // } else {
    //     # code...
    // }
    
    $website->save();
    return redirect()->route('admin.home');
}
}
