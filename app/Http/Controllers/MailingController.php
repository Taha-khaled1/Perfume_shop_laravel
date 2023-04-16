<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function mailing(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email','email:rfc'],
            'name' => 'required',
            'massege' => 'required',
        ] );
         $data =new Mailing();
        $data->name =  $request->name;
        $data->email = $request->email;
        $data->massege =  $request->massege;
        $data->user_id = $request->user_id;
        $data->properity_id = $request->properity_id;

        $data->save();


            return response()->json([
                'message' => "تم الاسال!"
            ]);

        

    }
}
