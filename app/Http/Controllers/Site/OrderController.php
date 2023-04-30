<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notfication;
use App\Models\Product;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Discount;
use App\Models\OrderAddress;
use App\Notifications\OrderRequest;
use Illuminate\Support\Facades\Notification;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Setting; 

use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $address;
    protected $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
     
  
    public function index(Request $request)
    {    
        if($this->cart->total() == 0){
            // notify()->error(__('The cart is empty'));

            return redirect()->route('viewHomePage');
        }
        $offer = Setting::where('key', 'main_title')->first()->value;;
        $rate = $request->rate;
     
        $adrees = Address::where('user_id',auth()->user()->id??37)->get();
        $cities = City::get();
         if($request->address_id){
           $this->address = Address::find($request->address_id);
            $add =1;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'address' =>  $this->address,
                'add' =>  $add,
                'offer' =>  $offer,
                'rate' =>  $rate,
                'cities' =>  $cities,
                'adrees'=> $adrees
            ]);
        }else{
            $add =2;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'add' =>  $add,
                'rate' =>  $rate,
                'offer' =>  $offer,
                'cities' =>  $cities,
                'adrees'=> $adrees
            ]);
        }
       
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            // 'area' => ['required'],
            'phone' => 'required',
            // 'street' => ['required'],
           'payment_method' => 'required',

        ] );
            
        $userId = auth()->user()->id;



            if($this->cart->total() == 0){
                // notify()->error( __('The cart is empty'));
    
                return redirect()->route('viewHomePage');
            }
             //register 
            if(isset($request->make_user)){ 
                $this->validate($request, [
                'email' => ['required', 'string', 'email','email:rfc' , 'max:255', 'unique:users'],
                'password' => ['required','confirmed', Rules\Password::defaults()],
                //'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
            ] );
             
           
        }
            try{

                






        $data1 = new Order();
        if ($data1) {
            // try {
                if(auth()->user()){
                    $userid = auth()->user()->id;
                    $data1->user_id = auth()->user()->id;
                }
                 if(isset($user)){
                    $data1->user_id = auth()->user()->id;
                }
                
                $data1->nots = $request->nots;
                $data1->discount = $request->discount;
                $data1->payment_method = $request->payment_method;
                $data1->shipping = $request->shipping;
                $data1->total = $request->total;
                if ($request->payment_method == "check") {
                    $data1->status = 5;
                } else{
                    // $user=User::all();
                
                    // $userid = auth()->user()->id;
                    // Notfication::send($user , new InvoicePaid($userid) );

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
                $data1->save();

                $address = new OrderAddress();
            
                $address->order_id = $data1->id;
                $address->user_id = auth()->user()->id;
                $address->name = $request->name??"null";
                $address->email = $request->email;
                $address->area = $request->area;
                // $address->street = $request->street;
                $address->Blvd = $request->Blvd;
                $address->house = $request->house ?? "house";
                $address->phone = $request->phone;
                    $address->save();
                // return $this->cart->get();
                foreach($this->cart->get() as $a){
                    
                    $item = new OrderItem();
                            
                    $item->order_id = $data1->id;
                    $item->product_id = $a->product->id;
                    $item->product_name =$a->product->name??"null";
                    $item->price = $a->product->price;
                    $item->quantity = $a->quantity; 
                    $item->options = $a->options; 
                    $item->color = $a->color; 
                        $item->save();
                }


                
                $city = City::where('name',$request->area)->first();

if ($request->readio != "yesss") {
    $data = new Address();
    if ($data) {
        // try {
            $data->user_id = auth()->user()->id;
            $data->name = $request->name??"null";
            $data->email = $request->email;
            $data->area = $request->area;

            $data->Shipping = $city->price??"10";
            $data->street = $request->street??"-";
            $data->Blvd = $request->Blvd??"-";
            $data->house = $request->house??"-";


            $data->phone = $request->phone;
            $data->save();
    
        // notify()->success('تم اضافة العنوان !');
        


    } 
}

               $data8 = new Payment();
      
            // try {
                $data8->order_id = $data1->id;
                $data8->amount = "5";
                $data8->currency = "USD";
               
                $data8->method = $request->payment_method;

                $data8->status = "pending";
                $data8->transaction_id = "1";
                $data8->transaction_data = "1";
       
                $data8->save();
            // notify()->success('تم اضافة العنوان !');
            


      

          

             
             
                $this->cart->empty();
                $email = $address->email;
                if($email){
                    Notification::route('mail' ,$email)->notify(new OrderRequest($data1));
                }
                
                if($request->payment_method == "check"){
                    $order= $data1;
                    // notify()->success( __('The request has been sent, please check the email for details'));

                    return redirect()->route('orders.payments.create', $order->id);
                }
                   
                 if(isset($user)){ 
                    event(new Registered($user));
                    Auth::login($user);
                    // notify()->success( __('The request has been sent, and you are logged in, please check the email for details'));
                    return redirect(RouteServiceProvider::HOME);
                }else{
            notify()->success( __('The request has been sent, please check the email for details'));
            return redirect()->route('viewHomePage');
                }
        } else {
            return redirect()->back()->with('error', 'خطأ بالبيانات');
        }
            } catch (\Exception $e){

                return   $e->getMessage() ;
            }
            
    }
    
    public function showorder($id)
    {
       
        $order = Order::find($id);
        if($order){
            return view('site.homePage.ordershow', [
                 'order' =>  $order, 'cart' => $this->cart,
            ]);
        }else{
            return redirect()->back();
        }
        

 
    }
     public function delevorder($id)
    {
       
        $order = Order::find($id);
        if($order){
            $order->status = 3 ;
            $order->save();
            notify()->success(__('Request received'));
            return redirect()->route('viewHomePage');

        }else{
            return redirect()->route('viewHomePage');
        }
        

 
    }
 
    public function delete_order(Request $request)
    {
        $order = Order::find($request->id);
        
        $order->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }


    public function cartempty( )
    {
       
        $this->cart->empty();
        notify()->success(__('The cart has been emptied'));
        return redirect()->route('viewHomePage');

    }
    
    public function discount(Request $request)
    {
       $discount = Discount::where('code', $request->code)->get()->first();
       if($discount){
        $rate = $discount->rate / 100;
        $cities = City::get();
         if($request->address_id){
           $this->address = Address::find($request->address_id);
            $add =1;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'address' =>  $this->address,
                'add' =>  $add,
                'cities' =>  $cities,
                'rate' =>  $rate,
                
            ]);
        }else{
            $add =2;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'add' =>  $add,
                'rate' =>  $rate,
                'cities' =>  $cities,

            ]);
        }
       }else{
        return redirect()->back();

       }
         
    }
    
    public function numberorder(Request $request)
    {    
          $order = Order::where('number', $request->number)->first();
          if($order){
            return view('site.homePage.ordershow', [
                 'order' =>  $order, 'cart' => $this->cart,
            ]);
        }else{
            notify()->error( __('Verify the order number'));

            return redirect()->back();
        }
       
    }
    public function get_shipping($name)
    {       
      $city = City::where('name' , $name)->first();
       return $city; 
    }
    public function get_discount($code)
    {       
      $data = Discount::where('code' , $code)->first();
       return $data; 
    }

}