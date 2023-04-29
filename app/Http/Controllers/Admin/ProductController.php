<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notfication;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Option;
use Illuminate\Support\Facades\Http;
use Image;


class ProductController extends Controller
{
      public function products_list()
    {
        $n = Notfication::all();
        return view('admin.products.list',['notf'=>$n]);
    }
    public function product_add()
    { $n = Notfication::all();
        $category = Category::get();
        return view('admin.products.add', [
            'category' => $category,'notf'=>$n
         ]);   
    }
    
    public function productsajax(Request $request)
    {

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        if ($request->get('order') == 'name') {
            $rorder = "name";
        } else {
            $rorder = $request->get('order');
        }
        $columnIndex_arr = $rorder;
        $columnName_arr = $request->get('columns');
        $order_arr = $rorder;
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        //$columnName = $columnName_arr[$columnIndex]['data']; // Column name
        if ($columnName_arr[$columnIndex]['data'] == 'name') {
            $columnName = "name";
        } else {
            $columnName = $columnName_arr[$columnIndex]['data'];
        }

        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Product::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Product::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->orWhere('description', 'like', '%' . $searchValue . '%')->count();
        $records = Product::orderBy($columnName, $columnSortOrder)
            ->where('name', 'like', '%' . $searchValue . '%')
            ->orWhere('description', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy('id', 'desc')
            ->get();


        // Fetch records

        $data_arr = array();

        foreach ($records as $record) {

            $id = $record->id;
            $name = $record->name;
            if($record->category){$c = $record->category->name;}else{$c= "";}
            $code = $record->code;
            $quantity = $record->quantity;
            $image = $record->image;
            $price = $record->price;
            if($record->price_alternative){$price_alternative = $record->price_alternative;}else{$price_alternative= "لا يملك";}
            $created_at = $record->created_at->format('d/m/Y');

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "code" => $code,
                "price" => $price,
                "created_at" => $created_at,
                 "quantity" =>$quantity ,
                "image" => '<img src="/storage/property/'.$image.'"  width="80">   ',
                "actions" => '
                <a href="' . route('admin.product.profile', [$record->id]) . '"><i class="icofont-eye  text-secondary font-20"></i></a>&nbsp;&nbsp;
                <a href="#"  data-delete="'. route('admin.product.delete', [$record->id]) .'"  data-id="'. $record->id .'" class="delete_product" onclick="delete_product(this)"><i class="icofont-trash text-danger  "></i></a>
'

            );
        }
        // ' . route('admin.product.delete', [$record->id]) . ' 
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    
  

   
    public function product_profile($id)
    {
         $category = Category::get();
         $cities = City::get();
        $product = Product::find($id);
        
         
        $n = Notfication::all();
        if($product ){
            return view('admin.products.profile', [
                'product' => $product, ['notf'=>$n], 
                'category' => $category, 
                'cities' => $cities, 
             ]);   
         }
        return redirect()->back();
    }
    

    public function product_save(Request $request)
    { 
      
            $request->validate([
            'name' => 'required|max:100',
            'code' => 'required|unique:products|max:100',
            // 'description' => 'required|max:300',
            'category_id' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048', 
            // 'quantity' => 'required',
            'price' => 'required|numeric',
            // 'price_alternative' => 'numeric',
              ],$messages = [
                'name.required' => 'اسم المنتج مطلوب!',
                'code.unique' => ' المنتج موجود !',
                'code.required' => 'رمز المنتج مطلوب!',
                // 'description.required' => '  الوصف مطلوب!',
                'category_id.required' => ' النوع مطلوبة',
                'main_image.required' => ' الصورة مطلوبة',
                'description.max' => '   عدد الاحرف المسموح به 300 حرف',
                'price.required' => ' السعر مطلوبة',
                // 'quantity.required' => ' الكمية مطلوبة',

            ]);

  
           $product = new Product();
   
           if (request()->main_image != null) {
            $image = $request->file('main_image');
            $input['main_image'] = time().'.'.$image->getClientOriginalExtension();
            $imgFile = Image::make($image->getRealPath());
            $watermark = Image::make(public_path('assets/img/logom.png'))->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
       

            
            $imgFile->insert($watermark, 'bottom-right', 10, 10)
            ->text('© 2016-2023 OUDZ.ae - All Rights Reserved', 120, 100, function($font) { 
                $font->size(35);  
                $font->color('#ffffff');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(90);  
            })->save(public_path('storage/property').'/'.$input['main_image']);
          //  $imgFile->save(public_path('property').'/'.$input['main_image']); 
          



            //    $main_image = $this->uploadImage('property', $request->file('main_image'));
               $product->image = $input['main_image'];

           }


           $product->name =  $request->name??'';
           $product->name_en=  $request->name_en??'';
           $product->description = $request->description??'';
        //    $product->description_en = $request->description_en??'';
           $product->category_id = $request->category_id[0]??'36';
           $product->quantity = $request->quantity??0;
           $product->code =  $request->code??rand(1,100000);
           $product->size =$request->size??0;
           $product->featured =$request->featured??1;
     
       
           $product->price = $request->price??0	; 


           $product->shope_name = $request->shope??'لايوجد اسم';
        //    $product->shope_name_en = $request->shope_en??'not name';
        //    $product->price_oragin = $request->price_oragin ??0	; 





        //    $product->price_alternative = $request->price_alternative??1; 
           $product->quantity = $request->quantity??0; 
           $product->status =  $request->status??1;
           if ($request->topproduct == '1') {
            $product->istop = 1;
           } else if($request->topproduct == '2'){
            $product->istop= 2 ;
           } else if($request->topproduct == '3'){
            $product->istop = 3 ;
           }
            
           $product->save();  

           
           
        //    $name[] = $request->file('album');
        //    $a= $request->a;
        //    for($i = 0; $i < count($a); $i++)
        //      {
        //       if( isset($request->file('album')[$i])) {
        //       $album =new Album();
        //       $album->product_id = $product->id;
        //       $name = $this->uploadImage('property', $request->file('album')[$i]);
        //       $album->name =$name;         
        //       $album->save();
        //        }
        //      }
           
             
        

        //     // foreach ($request->color as $xc) {
        //     //     if( $xc != null){   
        //     //         $c =new Color();
        //     //         $c->product_id = $product->id;              
        //     //         $c->color =$request->color[$i];         
        //     //         $c->save();
        //     //     }
        //     // }


        //   for($i = 0; $i < count($request->color); $i++)
        //      {
        //         $c =new Color();
        //         $c->product_id = $product->id;              
        //         $c->color =$request->color[$i];
        //         if ($request->priceco[$i] !=null) {
        //             $c->price =$request->priceco[$i];  
        //         }else{
        //             $c->price =0;
        //         }       
        //         $c->save();


        //      }



            //  for($i = 0; $i < count($request->option); $i++)
            //  {
            //     $op =new Option();
            //     $op->product_id = $product->id;             
            //     $op->name =$request->option[$i]; 
            //     if ($request->priceop[$i] !=null) {
            //         $op->price =$request->priceop[$i];  
            //     }else{
            //         $op->price =0;
            //     }       
            //     $op->save();


            //  }







        //      for($i = 0; $i < count($request->opti); $i++)
        //      {

        //         if ($request->opti[$i] !=null) {
        //             $op =new Option();
        //             $c =new Color();
        //             $op->product_id = $product->id;             
        //             $op->name =$request->opti[$i]; 
        //             $c->product_id = $product->id;
        //             $c->color =$request->colo[$i];

        //             if ($request->pricoloandopti[$i] !=null) {
        //                 $op->price =$request->pricoloandopti[$i];  
        //             }else{
        //                 $op->price =0;
        //             }       
        //             $op->save();
        //             $c->save();
        //         }

        //      }


           if($product) {
            notify()->success('تم اضافة منتج  !');
                return redirect()->back();
            } else  {
                return redirect()->back()->with('error', 'There is an error in your data');
            }
        
       
     
    }
    public function delete_color(Request $request)
    {  
        $color =  Color::find($request->id);
        
        $color->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }

    public function delete_option(Request $request)
    {  
        $option =  Option::find($request->id);
        
        $option->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }

    function uploadImage($folder, $image)
    {
        // $image->store('/', $folder);
     
        
            //    $this->validate($request, [
            //     'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
            // ]);
            // $image = $request->file('file');
            // $input['file'] = time().'.'.$image->getClientOriginalExtension();
            // $imgFile = Image::make($image->getRealPath());
             $image->text('© 2016-2020 positronX.io - All Rights Reserved', 120, 100, function($font) { 
                $font->size(35);  
                $font->color('#ffffff');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(90);  
            })->store('/', $folder);
            $filename = $image->hashName();
            $path = $filename;
        return $path;
    }

    


    public function product_edit(Request $request)
    { $request->validate([
        'name' => 'required|max:100',
        'code' => 'required|max:100',
        'description' => 'required|max:300',
        'category_id' => 'required',
        'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048', 
        'price' => 'required|numeric',
       
          ],$messages = [
            'name.required' => 'اسم المنتج مطلوب!',
            'code.required' => 'رمز المنتج مطلوب!',
            'description.required' => '  الوصف مطلوب!',
            'category_id.required' => ' النوع مطلوبة',
            'description.max' => '   عدد الاحرف المسموح به 300 حرف',
          
        ]);

          
        $product =  Product::find($request->id);

       if (request()->main_image != null) {
           $main_image = $this->uploadImage('property', $request->file('main_image'));
           $product->image =  $main_image;
       }
       $product->name =  $request->name;
       $product->description = $request->description;
       $product->name_en=  $request->name_en;
    //    $product->description_en = $request->description_en;
       $product->category_id = implode(' ',$request->category_id);
       $product->quantity = $request->quantity;
       $product->code =  $request->code;
       $product->size =$request->size;
       $product->featured =$request->featured;
    //    $product->guarantee = $request->guarantee;
    //    $product->sku = $request->sku;
       $product->price = $request->price	; 
    //    $product->price_alternative = $request->price_alternative; 
       $product->quantity = $request->quantity; 
       $product->status =  $request->status; 
       $product->save(); 

       
    //    $name[] = $request->file('album');
    //    $a= $request->a;
    //    for($i = 0; $i < count($a); $i++)
    //      {
    //           if( isset($request->file('album')[$i])) {
    //       $album =new Album();
    //       $album->product_id = $product->id;
    //       $name = $this->uploadImage('property', $request->file('album')[$i]);
    //       $album->name =$name;         
    //       $album->save();
    //        }
    //      }
       
         
    //   $col[] = $request->input('color');
    //     $cc= $request->co;
    //   for($i = 0; $i < count($cc); $i++)
    //      {
    //         if( $request->input('color')[$i] =="#000000"){}else{
    //       $c =new Color();
    //       $c->product_id = $product->id;              
    //       $c->color =$request->color[$i];         
    //       $c->save();
           
    //      }}

    //      $option[] = $request->input('option');
    //      $price[] = $request->price;
    //      $oo= $request->op;
    //      for($i = 0; $i < count($oo); $i++)
    //       {
           
    //         if($request->input('option')[$i] == null ){}else{
    //         $op =new Option();
        //     $op->product_id = $product->id;              
        //     $op->name =$request->option[$i];  
        //      $op->save();
             
        //   }
        // }

       if($product) {
        notify()->success('تم التعديل  !');
            return redirect()->back();
        } else  {
            return redirect()->back()->with('error', 'There is an error in your data');
        }
       
 
    }
 
    public function delete_product($id)
    {  
        $product =  Product::find($id);
        
        $product->delete();
        notify()->success('تم الحذف  !');
        return redirect()->back();

    }

    public function editqty(Request $request)
    {   
        $product =  Product::where('code', $request->code)->first();
     
        $product->quantity =  $request->qty;
        $product->save();
        Http::post('https://db.alwansolar.com/api/qtydit', [
            'code' => $request->code,
            'qty' => $request->qty,           
        ]);
        if($product){
            notify()->success('تم تعديل الكمية !');
            return redirect()->back();
    
        }
       
    }

}
