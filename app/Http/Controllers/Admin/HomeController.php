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
     

         $n=Notfication::where('read','0')->get();
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
        $n=Notfication::where('read','0')->get();
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
    if ($website->data_time != $request->data_time) {
        $website->data_time = $request->data_time??"2023-04-30T01:54";
        $website->is_time = 0 ; // 
    }
    $website->Description_ar = $request->description_ar??"";
    $website->Description_en = $request->description_en??"";
    // if (has) {

    // } else {
    //     # code...
    // }
    
    $website->save();
    return redirect()->route('admin.home');
}
}
