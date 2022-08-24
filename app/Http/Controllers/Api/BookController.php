<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index()
    {   $book = Book::all();
        return BookResource::collection($book);
    }

    public function show($id)
    {
       $book = Book::find($id);

       if(!$book) {
       return response()->json([
        'data' => 'no result'
       ], 404);
       }

       return new BookResource($book);
    }

    public function store(Request $request)
    {
        $book = Book::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'sprice' => $request->sprice,
            'quantity' => $request->quantity,
            'pages' => $request->pages,
            'author' => $request->author,
        ]);

       $category =  $book->categories()->attach($request->category_ids);

       $file = $request->file('image');
       $filename = time() . '_' . $file->getClientOriginalName();
       $dir = 'upload/images';
       $path = $file->store($dir, $filename);

        $image = $book->create([
            'path' => $path,
        ]);
       
        return response()->json([
            compact('book', 'category')
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'sprice' => $request->sprice,
            'quantity' => $request->quantity,
            'pages' => $request->pages,
            'author' => $request->author,
        ]);

        return response()->json([compact('book')], 200);
    }

    public function destroy ($id)
    {
         $book = Book::destroy($id);
        return response()->json([], 200);
    }
}
