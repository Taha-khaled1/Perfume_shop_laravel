<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Cart\CartRepository;
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
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{   protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    public function viewMyAccountPage()
    {
       $cities = City::get();
        $id = auth()->user()->id;
        $properties = Properity::where('user_id', $id)->latest()->get() ;
        $countries = Country::get();
        $mailings = Mailing::where('user_id', $id)->latest()->get() ;
        return view('site.userPages.myAccount', ['properties'=> $properties , 'cities'=> $cities , 'mailings'=> $mailings]);
    }
    public function viewMyAccountcatogery()
    {   $p=DB::table('websits')->first();
        $carousels = Carousel::latest()->get();
        $products = Product::where('featured', 1)->latest()->limit(10)->get();
        $categores = Category::where('featured', 1)->orderBy('ord', 'ASC')->get();
        $categories  = Category::with('product')->get();
        $setting = Setting::all();
        $title = $setting->where('key', 'section1_header')->first()->value;
        $text = $setting->where('key', 'section2_header')->first()->value;
        $img = $setting->where('key', 'section1_image')->first()->value;
        $url = $setting->where('key', 'section1_url')->first()->value;
        $data=  Slide::all();
        // $toppro=Product::where('istop', 1)->limit(12)->get();
        return view('site.homePage.catogery_view', ['ispro'=>$p,'categories'=>$categories,   'cart' => $this->cart, ] , ['products'=> $products])->with('categores',$categores)
        ->with('title',$title)
        ->with('text',$text)
        ->with('img',$img)
        ->with('url',$url);
    }
    public function wishlist()
    {
        $products[] = auth()->user()->products;

        return view('site.userPages.wishlist', ['products'=> $products,'cart' => $this->cart, ]);
    }
    
    public function viewHomePage()
    {   $p=DB::table('websits')->first();
        $carousels = Carousel::latest()->get();
        $products = Product::where('featured', 1)->latest()->limit(10)->get();
        $categores = Category::where('featured', 1)->orderBy('ord', 'ASC')->get();
        $categories  = Category::with('product')->get();
        $setting = Setting::all();
        $title = $setting->where('key', 'section1_header')->first()->value;
        $text = $setting->where('key', 'section2_header')->first()->value;
        $img = $setting->where('key', 'section1_image')->first()->value;
        $url = $setting->where('key', 'section1_url')->first()->value;
        $data=  Slide::all();
        // $toppro=Product::where('istop', 1)->limit(12)->get();
        return view('site.homePage.homePage', ['carousels'=> $carousels,'images'=>$data,'categories'=>$categories,'ispro'=>$p,'cart' => $this->cart, ] , ['products'=> $products])->with('categores',$categores)
        ->with('title',$title)
        ->with('text',$text)
        ->with('img',$img)
        ->with('url',$url);
    }

    // public function viewHomePage()
    // {
    //     $carousels = Carousel::latest()->get();
    //     $products = Product::where('featured', 1)->latest()->limit(10)->get();
    //     $categories  = Category::with('products')->get();
    //     // return  $categores ;
    //     $setting = Setting::all();
    //     $title = $setting->where('key', 'section1_header')->first()->value;
    //     $text = $setting->where('key', 'section2_header')->first()->value;
    //     $img = $setting->where('key', 'section1_image')->first()->value;
    //     $url = $setting->where('key', 'section1_url')->first()->value;
    //     $data=  Slide::all();
    //     // $toppro=Product::where('istop', 1)->limit(12)->get();
    //     return view('site.homePage.homePage', ['carousels'=> $carousels,'images'=>$data,'categories'=>$categories ] , ['products'=> $products])->with('categores',$categores)
    //     ->with('title',$title)
    //     ->with('text',$text)
    //     ->with('img',$img)
    //     ->with('url',$url);
    // }

   



    public function viewContact()
    {
       
        return view('site.homePage.contact',['cart' => $this->cart,]);
    }

    public function viewAboutUs()
    {
        $data = Setting::all()->where('key', 'section5_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section5_details_en')->first()->value;

        return view('site.homePage.about',['cart' => $this->cart,])->with('data_en',$data_en)->with('data',$data);
    }

    public function Shipping()
    {        
        $data = Setting::all()->where('key', 'section2_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section2_details_en')->first()->value;

        return view('site.homePage.Shipping',['cart' => $this->cart,])->with('data',$data)->with('data_en',$data_en);
    }
    public function questions()
    {  
        $data = Setting::all()->where('key', 'section4_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section4_details_en')->first()->value;

        return view('site.homePage.questions',['cart' => $this->cart,])->with('data',$data)->with('data_en',$data_en);
    }
    public function conditions()
    {
        $data = Setting::all()->where('key', 'section3_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section3_details_en')->first()->value;

        return view('site.homePage.conditions',['cart' => $this->cart,])->with('data',$data)->with('data_en',$data_en);
    }
    public function policy()
    { 
        $data = Setting::all()->where('key', 'section1_details')->first()->value;
        $data_en = Setting::all()->where('key', 'section1_details_en')->first()->value;

        return view('site.homePage.policy',['cart' => $this->cart,])->with('data',$data)->with('data_en',$data_en);
    }

    public function products()
    { 
       
      $products = Product::where('quantity', '>=', 1)->latest()->paginate(15);
        
       
      return view('site.homePage.products', ['cart' => $this->cart,'products' => $products,]);
    }
}
