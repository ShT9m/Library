<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $author;
    private $book;

    public function __construct(Author $author, Book $book)
    {
        $this->author = $author;
        $this->book = $book;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $authors = $this->author->all();
        $books   = $this->book->all();

        return view('index')
                ->with('authors', $authors)
                ->with('books', $books);
    }
}
