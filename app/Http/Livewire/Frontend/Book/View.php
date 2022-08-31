<?php

namespace App\Http\Livewire\Frontend\Book;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{   
    public $books, $category;
    public function  addToWishlist($productId) {


        if(!auth()->user()){
            return redirect()->back()->with('message', 'You are not login');
        } else {
            if(Wishlist::where('user_id', auth()->id())->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to wishlist');
            } else {
                
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $productId, // product id 
            ]);
            session()->flash('message', 'Added to wishlist successfully'); 
            }
        }
    }

    public function mount ($books, $category)
    {
      $this->books = $books;
      $this->category = $category;
    }
    public function render()
    {
        return view('livewire.frontend.book.view', [
            'books' => $this->books,
            'category' => $this->category,
        ]);
    }
}
