<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Carousel;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function carousels_list()
    {
        $carousels = Carousel::all();
        return view('admin.carousels.list', [
            'carousels' => $carousels,       
        ]);
    }

   
    public function carousel_profile($id)
    {
        $carousel = Carousel::find($id);
        if($carousel ){
            return view('admin.carousels.profile', [
                'carousel' => $carousel,       
            ]);   
         }
        return redirect()->back();
    }
    

    public function carousel_save(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048', 

        ]);
        $carousel =new Carousel();
        if (request()->image != null) {
            $image = $this->uploadImage('property', $request->file('image'));
            $carousel->image =  $image;
        }
        $carousel->title =  $request->title;
        $carousel->subtitle =  $request->subtitle;
        $carousel->link =  $request->link;
        $carousel->text =  $request->text;
        $carousel->title_en =  $request->title_en;
        $carousel->subtitle_en =  $request->subtitle_en;
         $carousel->text_en =  $request->text_en;
        $carousel->save();
 
          if($carousel) {
            notify()->success('تم  الاضافة بنجاح  !');
              return redirect()->back();
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }


    public function carousel_edit(Request $request)
    {

        $id =  $request->id;
        $carousel = carousel::find($id);
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048', 

        ]); 
        if (request()->image != null) {
            $image = $this->uploadImage('property', $request->file('image'));
            $carousel->image =  $image;
        }
        $carousel->title =  $request->title;
        $carousel->text =  $request->text;
        $carousel->subtitle =  $request->subtitle;
        $carousel->link =  $request->link;
        $carousel->title_en =  $request->title_en;
        $carousel->subtitle_en =  $request->subtitle_en;
         $carousel->text_en =  $request->text_en;
             
        $carousel->save();
 
          if($carousel) {
            notify()->success('تم  التعديل بنجاح  !');

              return redirect()->back();
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    public function delete_carousel(Request $request)
    {  
        $carousel =  carousel::find($request->id);
        
        $carousel->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }

    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }

}
