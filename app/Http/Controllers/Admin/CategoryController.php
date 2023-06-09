<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notfication;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories_list()
    {$n=Notfication::where('read','0')->get();
        $categories = Category::orderBy('ord', 'ASC')->get();
        return view('admin.categories.list', [
            'categories' => $categories,       'notf'=>$n,
        ]);
    }

   
    public function category_profile($id)
    {  $n=Notfication::where('read','0')->get();
        $categories = Category::all();

        $category = Category::find($id);
        if($category ){
            return view('admin.categories.profile', [
                'category' => $category,     'notf'=>$n,  
                'categories' => $categories,       
            ]);    }
        return redirect()->back();
    }
    

    public function category_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);
        $category =new Category();
        if (request()->img != null) {
               $img = $this->uploadImage('property', $request->file('img'));
               $category->img =  $img;
           }
           $category->name =  $request->name;
           $category->name_en =  $request->name_en;
            $category->ord =  $request->ord;
            if ($request->featured != null) {
                $category->featured =  $request->featured;
            }
       
        $category->category_id =  $request->category_id;

        $category->save();
 
          if($category) {
            notify()->success('تم اضافة قسم !');

              return redirect()->back();
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }

    public function category_edit(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);

        $id =  $request->id;
        $category = Category::find($id);
          if (request()->img != null) {
               $img = $this->uploadImage('property', $request->file('img'));
               $category->img =  $img;
           }
        $category->name =  $request->name;
        $category->name_en =  $request->name_en;
        $category->ord =  $request->ord;
        $category->featured =  $request->featured;
        $category->category_id =  $request->category_id;
       
        $category->save();
 
          if($category) {
            notify()->success('تم تعديل القسم !');

              return redirect()->back()->with('message', 'SAVED!');
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

    public function delete_category(Request $request)
    {  
        $category =  Category::find($request->id);
        
        $category->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }
}
