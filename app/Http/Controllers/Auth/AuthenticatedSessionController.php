<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Notfication;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{    protected $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
     
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('site.auth.loginPage',['cart' => $this->cart]);
    }
    

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
          $request->authenticate();

          $request->session()->regenerate();

        //   $user=    User::where('email',$request->email)->first();

        //    $noty = new Notfication();

        //     $noty->title="تسجيل الدخول";
        //     $noty->message=" تم تسجيل الدخول بواسطة المستخدم ".$user->fname ;

        //     $noty->save();

            return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

