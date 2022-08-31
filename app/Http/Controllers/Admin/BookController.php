<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin/book/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $colors = Color::all();
        return view('admin/book/create', compact('categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {   

        // dd($request->all());
       
        // book create 
                $books =  Book::create([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'description' => $request->description,
                    'pages' =>$request->pages,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'sprice' => $request->sprice,
                    'author' => $request->author,
                ]);



            if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time(). '_'. $file->getClientOriginalName();
            $dir = public_path('upload/images');
            $path = $file->move($dir,$filename);
          // Image upload to images table 
           
          $books->images()->create([
            'path' => $filename,
           ]);
           }
           // Category upload 
           $categoryId = $request->category_ids;
           $books->categories()->attach($categoryId);

             //    Paper Upload 
             $colorId = $request->color_ids;
             $books->colors()->attach($colorId);

           return redirect('admin/book')->with('message', 'A book was created successfully');
    }

    public function show($id)
    {   
        $books = Book::findOrFail($id);
        return new BookResource($books);
    }

    public function edit($id)
    {    $books = Book::findOrFail($id);
        $oldcategories = $books->categories()->pluck('id')->toArray();
        $categories = Category::all();
        $colors = Color::all();
        $oldcolors = $books->colors()->pluck('id')->toArray();
        
        return view('admin/book/edit', compact('categories', 'books', 'oldcategories', 'colors', 'oldcolors'))->with('message', 'A book is updated successfully');
    }

    public function update(BookUpdateRequest $request, $id)
    {   
     
        // find book by id 
        $books = Book::find($id);
       
    
         if($request->hasFile('image')) {

          
             // delete image from database  
            $books->images()->delete();
            // delete from storage
            // unlink('upload/images/'. $books->images->path);

               
            $file = $request->file('image');
            $filename = time(). '_'. $file->getClientOriginalName();
            $dir = public_path('upload/images');
            $file->move($dir,$filename);

           //update image 

        
        $books->images()->create([
            'path' => $filename,
           ]);
       }

       // update book 

        $books->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'pages' =>$request->pages,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'sprice' => $request->sprice,
            'author' => $request->author,
        ]);

       
        // update category 

        $books->categories()->sync($request->category_ids);
        // Update paper 

        $books->colors()->sync($request->color_ids);
       
        return redirect('admin/book')->with('message', 'Book was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('admin/book');
    }
}
