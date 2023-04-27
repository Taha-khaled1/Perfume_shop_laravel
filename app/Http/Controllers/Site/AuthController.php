<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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


    // public function login(Request $request)
    // {
    //     echo 'xxx';
    //   return $request;

    // // take otp and phone

    //  //otp_send == otp


    //  //change pass to otp 



    //  // login

    //     $request->validate([
    //         'phone' => 'required',
    //         'password' => 'required',
    //     ] 
    //     );
    //     $user = User::Where('phone', $request->phone)->first();
    //     if ($request->otp == $user->otp) {
            
    //     }
    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return redirect()->to('loginPage')->withErrors($messages);
    //     }
    //     notify()->success('   ');
    //     return redirect()->route('viewMyAccount');

    // }

    public function getRegisterPage()
    {
        return view('site.auth.registerPage');
    }

    //
}
