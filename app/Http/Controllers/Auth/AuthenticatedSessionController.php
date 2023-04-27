<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('site.auth.loginPage');
    }







    public function otp_pass_change(Request $request){
        return "zzzzzzzzzzzzzzzzzzz";
        $user=  User::where('phone',$request->phone)->first();
        return $user;
          //creat otp
          $otp_timp=rand(1,6);
          //save otp in database
           $user->otp=$otp_timp;
            $user->save();
           //send otp 
           $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . '121|TDdDdLoQ3TQlHpXmx21cHDtzhky0pcYmLPq7lUw5',
            'Accept' => 'application/json',
        ])->timeout(5)->post('https://whatsapp.aq-apps.xyz/api/v2/messages/send-message', [
            'session_uuid' => '9907f8d1-e548-44f5-887d-a7fa06bb22c6',
            'phone' => $request->phone,
            'message' => 'YOUR OTP IS ' . $otp_timp,
            'schedule_at' => now(),
            'type' => 'TEXT',
        ]);
        
      }










    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user=  User::where('phone',$request->phone)->first();
    //   return $request->password;
       if ($request->password == $user->otp ) {
        $user->password = Hash::make($request->password);
        $user->save();
       }
        $request->authenticate();

        $request->session()->regenerate();
        notify()->success('   ');
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

        return redirect('/login');
    }
}
