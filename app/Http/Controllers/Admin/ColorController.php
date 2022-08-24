<?php

namespace App\Http\Controllers\admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    public function index()
    {   

        $colors = Color::all();
        return view('admin/color/index', compact('colors'));
    }
    public function create()
    {   

        return view('admin/color/create');
    }
    public function store(ColorRequest $request)
    {
    
        Color::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status == true? '1' : '0',
        ]);

        return redirect('admin/color')->with('message', 'Color is added successfully');
    }
    public function edit($id)
    {   
        $colors = Color::findOrFail($id);
        return view('admin/color/edit', compact('colors'));
    }
    public function update(ColorRequest $request, $id)
    {   
        $colors = Color::findOrFail($id);
        $colors->update([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status == true? '1' : '0',
        ]);
      
        return redirect('admin/color')->with('message', 'A color is updated successfully');
    }
    public function destroy($id)
    {
        Color::destroy($id);
        return redirect('admin/color')->with('message', 'A color is deleted successfully');
    }
}
