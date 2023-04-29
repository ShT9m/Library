<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author){
        $this->author     = $author;
    }

    public function create(){
        $all_authors = $this->author->paginate(5);

        return view('users.authors.create')
                ->with('all_authors', $all_authors);
    }

    public function store(Request $request){
        $request->validate([
            'add_author' => 'required|min:1|max:50'
        ]);

        $this->author->name = $request->add_author;
        $this->author->save();

        return redirect()->route('author.create');
    }

    public function edit($id){
        $author = $this->author->findOrFail($id);

        return view('users.books.edit')
                ->with('author', $author);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:1|max:50',
        ]);

        // Update Author Data
        $author = $this->author->findOrFail($id);
        $author->name = $request->name;

        $author->save();

        return redirect()->route('author.create');
    }

    public function destroy($id){
        $author = $this->author->findOrFail($id);
        $author->forceDelete();

        return redirect()->route('author.create');
    }


    public function show(Request $request){
        $all_authors = $this->author->latest()->paginate(5);
    }
}
