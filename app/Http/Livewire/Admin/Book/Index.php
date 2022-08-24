<?php

namespace App\Http\Livewire\Admin\Book;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $books = Book::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.book.index', compact('books'));
    }
}
