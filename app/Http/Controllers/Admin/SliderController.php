<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
       return view('admin/slider/index', compact('sliders'));
    }

    public function create()
    {   
     
        return view('admin/slider/create');
    }

    public function store (SliderStoreRequest $request)
    {   
        $sliders =  Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == true? '1': '0',
        ]);
        
    if($request->hasFile('image')) {
        $file = $request->file('image');
       $filename = time(). '_'. $file->getClientOriginalName();
        $dir = public_path('upload/images/');
       $file->move($dir,$filename);
       
      // Image upload to images table 
        
      $sliders->images()->create([
        'path' => $filename,
       ]);
    }

    return redirect('/admin/slider')->with('message', 'a slider is created successfully');
}

    public function edit($id)
    {   
        $sliders = Slider::findOrFail($id);
        return view('admin/slider/edit', compact('sliders'));
    }

    public function update(SliderUpdateRequest $request, $id)
    {
          // find book by id 
          $sliders = Slider::find($id);
       
    
          if($request->hasFile('image')) {
 
           
              // delete image from database  
             $sliders->images()->delete();
             // delete from storage
           
 
                
         $file = $request->file('image');
         $filename = time(). '_'. $file->getClientOriginalName();
         $dir = public_path('/upload/images/');
         $file->move($dir,$filename);
 
            //update image 
 
         
         $sliders->images()->create([
             'path' => $filename,
            ]);
        }
 
        // update book 
 
         $sliders->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == true? '1': '0',
         ]);   
         return redirect('/admin/slider')->with('message', 'A slider was updated successfully');
    }

    public function destroy ($id)
    {
        Slider::destroy($id);

        return redirect('/admin/slider')->with('message', 'A slider was deleted successfully');
    }
}
