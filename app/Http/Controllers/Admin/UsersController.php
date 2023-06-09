<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Notfication;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;

class UsersController extends Controller
{
    //
   
    public function users_list()
    {
        $mentors = User::get();  $n=Notfication::where('read','0')->get();
        return view('admin.mentors.index',['notf'=>$n])->with('mentors', $mentors);
    }

    public function user_profile($id)
    {   
        $n=Notfication::where('read','0')->get();
        $mentors = User::where('id', $id)->first(); 
        $countries = Country::get();
        return view('admin.mentors.profile',['notf'=>$n] )->with('mentor', $mentors)->with('countries', $countries);
    }

    public function user_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->fname = $request->first_name;
            $mentor->lname = $request->last_name;
            $mentor->address = $request->address;         
             $mentor->Blvd = $request->Blvd;
            $mentor->phone = $request->phone;
            $mentor->country_id = $request->country_id;
            $mentor->city_id = $request->city_id;
            $mentor->email = $request->email ;
            $mentor->status = $request->status;
           
            $mentor->save();
            notify()->success('تم الاضافة  !');
            return redirect()->back();

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

   
       function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }
    public function user_delete(Request $request){

        $user = User::find($request->id);  
        if( $user){

            $user->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }

}
