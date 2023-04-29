@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <label for="add_book" class="h4 form-label d-block fw-bold">Add new book</label>
            <form action="{{ route('book.store') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group  col-6">
                    <label for="title" class="form-label mt-3 mb-0">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="enter book title">
                </div>
                <div class="form-group  col-2">
                    <label for="yearPublished" class="form-label mt-3 mb-0">Year Published</label>
                    <input type="text" name="yearPublished" id="yearPublished" class="form-control" placeholder="YYYY">
                </div>
                <div class="form-group  col-4">
                    <label for="author" class="form-label mt-3 mb-0">Author</label>
                    <select name="author" id="author" class="form-control text-muted">
                        @forelse ($all_authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @empty
                            You must add author first.
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3 col-1">
                    <i class="fa-solid fa-plus"></i>Add
                </button>
            </form>
        </div>
    </div>
    <hr class="text-muted">

    <div class="container">
        <div class="mt-3 col-9">
            <h1 class="h4 fw-bold">List of Books</h1>
            <table class="table table-hover bg-light border">
                @foreach($all_books as $book)
                    <tr>
                        <td>
                            <a href="{{ route('book.show', $book->id) }}">
                                {{ $book->title }} | {{ $book->yearPublished }} | {{ $book->author->name }}
                            </a>
                        </td>
                        <td class="text-end me-0 p-0">
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-outline-warning btn-sm">
                                <i class="fa-solid fa-file-pen"></i>
                        </td>
                        <td class="text-end ms-0">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-book-{{ $book->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            @include('users.books.contents.modals.delete')
                        </td>
                    </tr>
                @endforeach
                {{ $all_books->links() }}
            </table>
        </div>
    </div>
</div>

@endsection
