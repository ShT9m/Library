<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $book;
    private $author;

    public function __construct(Author $author, Book $book){
        $this->book = $book;
        $this->author = $author;
    }

    public function show($id){
        $all_books = $this->book->latest()->paginate();
        $book = $this->book->findOrFail($id);
        $author = $this->author->findOrFail($id);

        return view('users.books.show')
                ->with('book', $book)
                ->with('author', $author);
    }

    public function create(){
        $all_books = $this->book->paginate(5);
        $all_authors = $this->author->all();

        return view('users.books.create')
                ->with('all_books', $all_books)
                ->with('all_authors', $all_authors);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:1|max:50',
            'yearPublished' => 'required|min:1|max:4',
            'cover' => 'mimes:jpg,jpeg,png,gif|max:1048'
        ]);

        $this->book->title = $request->title;
        $this->book->yearPublished = $request->yearPublished;
        $this->book->author_id = $request->author;
        $this->book->cover = $this->saveImage($request);
        $this->book->save();

        return redirect()->route('book.create');
    }

    public function edit($id){
        $book = $this->book->findOrFail($id);
        $all_authors = $this->author->all();

        return view('users.books.edit')
                ->with('book', $book)
                ->with('all_authors', $all_authors);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|min:1|max:50',
            'yearPublished' => 'required|min:1|max:4',
            'cover' => 'mimes:jpg,jpeg,png,gif|max:1048'
        ]);

        // Update Book Data
        $book = $this->book->findOrFail($id);
        $book->title = $request->title;
        $book->yearPublished = $request->yearPublished;
        $book->author_id = $request->author;

        if($request->cover){
            $this->deleteImage($book->cover);
            $book->cover = $this->saveImage($request);
        }

        $book->save();

        return redirect()->route('book.create');
    }

    public function saveImage($request){
        $cover_name = time() . "." . $request->cover->extension();
        // image.jpg
        // $image_name = 1568765648.jpg
        $request->cover->storeAs(self::LOCAL_STORAGE_FOLDER, $cover_name);
        return $cover_name;

    }

    public function deleteImage($cover_name){
        $cover_path = self::LOCAL_STORAGE_FOLDER . $cover_name;
        //6485486.png
        // $image_path = "/public/images/6485486.png"

        if(Storage::disk('local')->exists($cover_path)){
            Storage::disk('local')->delete($cover_path);
        }
    }

    public function destroy($id){
        $book = $this->book->findOrFail($id);
        $book->forceDelete();

        return redirect()->route('book.create');
    }
}
