<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index ()
    {   
        $sliders = Slider::where('status', '0')->get();
        $books = Book::orderBy('id', 'desc')->limit(3)->get();
        return view('/frontend/index', compact('sliders', 'books'));
    }
    public function newBook ()
    {
        $books = Book::orderBy('id', 'desc')->limit(12)->get();
        return view('/frontend/collections/book/new', compact('books'));
    }
    public function categories()
    {   
       
            if($search = request('search')) {
                $categories = Category::latest('id')->where('name', 'like', "%$search%" )->paginate(5);
            } else {
                $categories = Category::latest('id')->where('status' , '0')->paginate(10);
            }
         
            // $categories = Category::where('status', '0')->get();
           return view('/frontend/collections/category/index', compact('categories'));
        } 
       

    public function books ($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
       

        if($category) {
            $books = $category->books()->get();

            return view('/frontend/collections/book/index', compact('books', 'category'));
        } else {
           return redirect()->back();
        }
        
    }

    public function bookDetail (string $category_slug, string $book_slug)
    {   
        $category = Category::where('slug', $category_slug)->first();
       
        if($category) {
            $books = $category->books()->where('slug', $book_slug)->first();

        if($books) {
            return view('/frontend/collections/book/view', compact('books', 'category'));
        } else {
            return redirect()->back();
        } 
        } else {
           return redirect()->back();
        }
    }
    public function bookAll()
    {   
        if($search = request('search')) {
            $books = Book::latest('id')->where('title', 'like', "%$search%" )->paginate(5);
        } else {
            $books = Book::latest('id')->paginate(10);
        }
     
       return view('frontend/view', compact('books'));
       
    }

  
}
