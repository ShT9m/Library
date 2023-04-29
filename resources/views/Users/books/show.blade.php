@extends('layouts.app')

@section('title', 'Show Book')

@section('content')
<div class="row">
    <div class="card bg-light">
        <div class="card-header h2 bg-light fw-bold border-0">
            Book Preview
        </div>
        <div class="card-body row bg-white">
            <div class="col-3">
                {{-- Cover --}}
                @if($book->cover)
                    <img src="{{ asset('storage/images/' . $book->cover) }}" alt="{{ $book->cover }}" class="img-thumbnail show-cover">
                @else
                    <i class="fa-solid fa-image fa-10x"></i>
                @endif
            </div>
            <div class="col mt-3 px-0">
                {{-- Title, Author Name, yerPublished  --}}
                <div class="h3 fw-bold">{{ $book->title }}</div>
                <div class="mt-2 mb-0 text-muted">by</div>
                <div class="h4 mb-2 fw-bold text-muted">{{ $book->author->name }}</div>
                <div class="h6 text-muted">published {{ $book->yearPublished }}</div>
            </div>
        </div>
        <div class="card-header bg-light border-0">
            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit Book</a>
        </div>
    </div>
</div>
@endsection
