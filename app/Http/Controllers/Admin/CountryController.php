<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;

use App\Models\Notfication;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countries_list()
    {    $n=Notfication::where('read','0')->get(); 
        $countries = Country::all();
        return view('admin.countries.list', [
            'countries' => $countries,     'notf'=>$n,        
        ]);
    }

   
    public function country_profile($id)
    {    $n=Notfication::where('read','0')->get(); 
        $country = Country::find($id);
        if($country ){
            return view('admin.countries.profile', [
                'country' => $country,  'notf'=>$n,           
            ]);    }
        return redirect()->back();
    }
    

    public function country_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);
        $country =new Country();
        
        $country->name =  $request->name;
       
        $country->save();

        $name = $request->city;
        $nameen = $request->cityen;
        for($i = 0; $i < count($name); $i++)
          {
           if( $name[$i] == ""){}else{
           $city =new City();
           $city->country_id = $country->id;
           $city->name =$name[$i] ;  
           $city->name_en =$nameen[$i] ;  
           $city->price =$request->price[$i] ;          
           $city->save();
            }
          }
          if($country) {
            notify()->success('تم اضافة دولة !');

              return redirect()->back();
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    public function delete_country(Request $request){

        $Country = Country::find($request->id);  
        $cites = City::where('Country_id', $request->id)->get();  
        if($cites){
            foreach($cites as $city){
                $city->delete();
            }
        }
        if( $Country){

            $Country->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }
    public function country_edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);

        $id =  $request->id;
        $country = Country::find($id);
        
        $country->name =  $request->name;
       
        $country->save();

        $name = $request->city;
        for($i = 0; $i < count($name); $i++)
          {
           if( $name[$i] == ""){}else{
           $city =new City();
           $city->country_id = $country->id;
           $city->name =$name[$i] ; 
           $city->price =$request->price[$i] ;                   
           $city->save();
            }
          }
          if($country) {
            notify()->success('تم التعديل  !');

              return redirect()->back()->with('message', 'SAVED!');
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    public function delete_city(Request $request)
    {  
        $city =  City::find($request->id);
        
        $city->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }

 
}
