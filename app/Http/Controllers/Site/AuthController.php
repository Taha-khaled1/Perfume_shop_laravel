<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    use GeneralTrait;

    public function getLoginPage()
    {
        return view('site.auth.loginPage');
    }
    public function send_otp(Request $request)
    {
        $request->validate([
            'phone' => 'required',
           
        ] 
        );
        $user = User::Where('phone', $request->phone)->first();

       if ($user) {
         $secret=Setting::where('key','secrt_sms');
         $public=Setting::where('key','public_sms');
        $basic  = new \Vonage\Client\Credentials\Basic("$public", "$secret");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("201113051656", 'OUDZ', 'otp 123456')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            return view('site.auth.otp_confirmm.blade.php');
        } else { 
            return redirect()->back()->with(['error' => "The message failed with status: " . $message->getStatus()]);
      
        }
    
    }
}
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
           
        ] 
        );
        $user = User::Where('phone', $request->phone)->first();

    //    if ($user) {
    //     // $set=Setting::all();
    //     $basic  = new \Vonage\Client\Credentials\Basic("043ad9c44", "ewmivBx91rr93yqgg");
    //     $client = new \Vonage\Client($basic);

    //     $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("201113051656", 'OUDZ', 'otp 123456')
    //     );
        
    //     $message = $response->current();
        
        // if ($message->getStatus() == 0) {
            return view('site.auth.otp_confirmm.blade.php');
        // } else { 
        //     return redirect()->back()->with(['error' => "The message failed with status: " . $message->getStatus()]);
      
        // }
    
        // notify()->success('   ');
        // return redirect()->route('viewMyAccount');
    }

    public function getRegisterPage()
    {
        return view('site.auth.registerPage');
    }

    //
}
