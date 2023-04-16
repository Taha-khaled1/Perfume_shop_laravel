<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Type;
use App\Models\Category;
use App\Models\Product;
use App\Models\City;

use App\Models\Mailing;

use App\Models\Properity;
use App\Models\Slide;

class SiteController extends Controller
{
    public function viewMyAccountPage()
    {
       $cities = City::get();
        $id = auth()->user()->id;
        $properties = Properity::where('user_id', $id)->latest()->get() ;
        $countries = Country::get();
        $mailings = Mailing::where('user_id', $id)->latest()->get() ;
        return view('site.userPages.myAccount', ['properties'=> $properties , 'cities'=> $cities , 'mailings'=> $mailings]);
    }

    public function wishlist()
    {
        $products[] = auth()->user()->products;

        return view('site.userPages.wishlist', ['products'=> $products ]);
    }
    
    public function viewHomePage()
    {
        $carousels = Carousel::latest()->get();
        $products = Product::where('featured', 1)->latest()->limit(10)->get();
        $categores = Category::where('featured', 1)->orderBy('ord', 'ASC')->get();
        $setting = Setting::all();
        $title = $setting->where('key', 'section1_header')->first()->value;
        $text = $setting->where('key', 'section2_header')->first()->value;
        $img = $setting->where('key', 'section1_image')->first()->value;
        $url = $setting->where('key', 'section1_url')->first()->value;
        $data=  Slide::all();

        return view('site.homePage.homePage', ['carousels'=> $carousels,'images'=>$data] , ['products'=> $products])->with('categores',$categores)
        ->with('title',$title)
        ->with('text',$text)
        ->with('img',$img)
        ->with('url',$url);
    }

   



    public function viewContact()
    {
       
        return view('site.homePage.contact');
    }

    public function viewAboutUs()
    {
        $data = Setting::all()->where('key', 'section5_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section5_details_en')->first()->value;

        return view('site.homePage.about')->with('data_en',$data_en)->with('data',$data);
    }

    public function Shipping()
    {        
        $data = Setting::all()->where('key', 'section2_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section2_details_en')->first()->value;

        return view('site.homePage.Shipping')->with('data',$data)->with('data_en',$data_en);
    }
    public function questions()
    {  
        $data = Setting::all()->where('key', 'section4_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section4_details_en')->first()->value;

        return view('site.homePage.questions')->with('data',$data)->with('data_en',$data_en);
    }
    public function conditions()
    {
        $data = Setting::all()->where('key', 'section3_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section3_details_en')->first()->value;

        return view('site.homePage.conditions')->with('data',$data)->with('data_en',$data_en);
    }
    public function policy()
    { 
        $data = Setting::all()->where('key', 'section1_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section1_details_en')->first()->value;

        return view('site.homePage.policy')->with('data',$data)->with('data_en',$data_en);
    }

    public function products()
    { 
       
      $products = Product::where('quantity', '>=', 1)->latest()->paginate(15);
        
       
      return view('site.homePage.products', compact('products'));
    }
}
