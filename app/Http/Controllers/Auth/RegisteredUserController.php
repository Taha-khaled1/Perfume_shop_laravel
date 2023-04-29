<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Notfication;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Cart\CartRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

     protected $cart;
     public function __construct(CartRepository $cart)
     {
         $this->cart = $cart;
     }
    public function create()
    {
        return view('site.auth.registerPage',['cart' => $this->cart]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'phone' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email','email:rfc' , 'max:255', 'unique:users'],
            'password' => ['required','confirmed', Rules\Password::defaults()],
            //'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
        ]
        // ,
            // [             
            //     // 'fname.required' =>  __("First name is required")  ,
            //     // 'fname.string' => ' الاسم الاول غير صالح',
            //     'lname.required' => ' الاسم الاخير مطلوب',
            //     'email.required' =>  __('Email is required') ,
            //     'email.unique' => ' الايميل مستخدم من قبل',
            //     'password.confirmed' => 'كلمة المرور غير متطابقة',
            //     'password.required' => 'كلمة المرور مطلوبة'
                
            // ]
        );
         
        $email = $request['email'];
        list($username, $domain) = explode('@', $email); 

        if (checkdnsrr($domain, 'MX')) {
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => '1',
            'type' => '1'
        ]);

        event(new Registered($user));

        // $user=    User::where('email',$request->email)->first();

        // $noty = new Notfication();

        //  $noty->title="تم انشاء حساب جديد ";
        //  $noty->message="تم انشاء حساب جديد بواسطة ".$user->fname ??"لم يتم ادخال الاسم" ;

        //  $noty->save();
        Auth::login($user);
        notify()->success('  ');
        return redirect(RouteServiceProvider::HOME);
    } else {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid email address');
        }
    }
}
