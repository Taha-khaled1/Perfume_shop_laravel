<?php

namespace App\Http\Controllers;
use App\Models\Subscriber;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscriber(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email','email:rfc'],
             
        ] );
         $data =new Subscriber();
        
        $data->email = $request->email;
         

        $data->save();


            return response()->json([
                'message' => __('has been sent!')
            ]);

        

    }}
