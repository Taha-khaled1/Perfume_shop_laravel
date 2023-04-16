<?php

namespace App\Http\Controllers;

use App\Models\slide;
use App\Models\Slide as ModelsSlide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=  ModelsSlide::all();
       return view('admin.home.addslide',['images'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:slides|max:255',
          //  'image' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
          //  'image.required' =>'يرجي ادخال الصوره',
            'name.unique' =>'اسم القسم مسجل مسبقا',


        ]);

        $filename = time().'.'.$request->image->getClientOriginalExtension();
        $path = $request->image->storeAs('catogeryimage', $filename,'Taha');

        $sections =new ModelsSlide();
        $sections->image = $path;
        $sections->name = $request->name;
        $sections->save();
        return redirect()->route('admin.slide');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    $data = ModelsSlide::findorFail($id);
        return view('admin.home.addaddsilde',['images'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.home.addnotupdate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {      
        
        
        $id = $request->id;

        $request->validate([
            'name' => 'required|unique:slides|max:255',
          //  'image' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
          //  'image.required' =>'يرجي ادخال الصوره',
            'name.unique' =>'اسم القسم مسجل مسبقا',


        ]);


        $sections = ModelsSlide::findOrFail($id);
    

        if ($request->has('image')) {


            $file_path = public_path($sections->image);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $path = $request->image->storeAs('catogeryimage', $filename,'Taha');
    
            // Update the trip with the new image path
            $sections->image = $path;
        }
        $sections->name = $request->name;
        $sections->save();
        return redirect()->route('admin.slide');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $sections = ModelsSlide::findorFail($id);
        $file_path = public_path($sections->image);
        if(file_exists($file_path)) {
            unlink($file_path);
        }
        $sections->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return back();
    }
}
