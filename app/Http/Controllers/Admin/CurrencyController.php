<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Notfication;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{  
    public function currencies_list()
    { $n=Notfication::where('read','0')->get(); 
        $currencies = Currency::all();
        return view('admin.currencies.list', [
            'currencies' => $currencies, 'notf'=>$n,      
        ]);
    }

   
    public function currency_profile($id)
    { $n=Notfication::where('read','0')->get(); 
        $currency = Currency::find($id);
        if($currency ){
            return view('admin.currencies.profile', [
                'currency' => $currency,    'notf'=>$n,     
            ]);   
         }
        return redirect()->back();
    }
    

    public function currency_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);
        $currency =new Currency();
        
        $currency->name =  $request->name;
       
        $currency->save();
 
          if($currency) {
              return redirect()->back()->with('message', 'SAVED!');
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }


    public function currency_edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);

        $id =  $request->id;
        $currency = Currency::find($id);
        
        $currency->name =  $request->name;
       
        $currency->save();
 
          if($currency) {
              return redirect()->back()->with('message', 'SAVED!');
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    public function delete_currency(Request $request)
    {  
        $currency =  Currency::find($request->id);
        
        $currency->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }
}
