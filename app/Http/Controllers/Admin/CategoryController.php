<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index()
    {   
        return view("admin.category.index");
    }
    public function create ()
    {
        return view("admin.category.create");
    }
    public function store (CategoryRequest $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

       if($request->hasFile('image')) {
        $file = $request->file('image');
       $filename = time(). '_'. $file->getClientOriginalName();
        $dir = public_path('/upload/images/');
        $file->move($dir,$filename);
        $path = '/upload/images/'.$filename;
        $category->image = $path;
       }
       
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;

        $category->status = $request->status == true? "1" : "0";

        $category->save();
        
        return redirect('admin/category')->with('message', 'A category is created successfully'); 
    }
    public function edit ($id)
    {
        $category = Category::findOrFail($id); 
       return view('/admin/category/edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::findOrFail($id); 
        // dd($request->all());
         if($request->hasFile('image')) {

            $path = '/upload/images/'.$category->image;

           if(File::exists($path)){
            File::delete($path);
           };

        $file = $request->file('image');
       $filename = time(). '_'. $file->getClientOriginalName();
        $dir = public_path('/upload/images/');
        $file->move($dir,$filename);
        $category->image = $filename;

       }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'mete_keyword' => $request->mete_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true? "1": "0",  
        ]);
       
        return redirect('admin/category')->with('message', 'Category was updated successfully');
    }

    public function destroy ($id)
    {

       Category::destroy($id);
        return redirect('admin/category')->with('message', 'A category is deleted successfully');
    }
}
