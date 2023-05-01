<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\Notfication;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userFavorites = auth()->user()->favorites()->with('product')->get();

         return view('user.favorites', compact('userFavorites'));
    }

    public function addFavorite($productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);
    
        // Check if the product already exists in the wishlist
        $favorite = Favorite::where('user_id', $user->id)
                            ->where('product_id', $product->id)
                            ->first();
    
        if ($favorite) {
            // If the product already exists in the wishlist, remove it
            $favorite->delete();
            return redirect()->back()->with('success', 'Removed from favorites');
        } else {
            // If the product does not exist in the wishlist, add it
            $favorite = new Favorite();
            $favorite->user_id = $user->id;
            $favorite->product_id = $product->id;
            $favorite->save();
            return redirect()->back()->with('success', 'Added to favorites');
        }
    }
    
    public function removeFavorite($productId)
    {
        $user = Auth::user();
        $product = Product::findOrFail($productId);
    
        $favorite = Favorite::where('user_id', $user->id)->where('product_id', $product->id)->firstOrFail();
        $favorite->delete();
    
        return back();
    }


    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $not=Notfication::where('read','0')->get();
        foreach ($not as $n) {
           $t=Notfication::find($n->id);
            $t->read=1;
            $t->save();
        }
         return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {$n=Notfication::where('read','0')->get(); 
        $city = City::find($id);
     return view('admin.countries.profileedit',
     
     [ 'city' => $city,     'notf'=>$n,    ]
    
    );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $city = City::find($request->id);
        // $city->country_id = $country->id;
        $city->name = $request->city ;  
        $city->name_en = $request->cityen ;  
        $city->price = $request->price ;          
        $city->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
