@extends('layouts.app')

@section('title', 'Index Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col me-3 h1 border shadow rounded d-flex align-items-center justify-content-center" style="height: 100px">
            {{-- @include Authors --}}
            <a href="{{ route('author.create') }}" class="text-decoration-none text-primary fw-bold bg-success">
                <i class="fa-solid fa-users me-1"></i>Author
                <span>{{ $authors->count() }}</span>
            </a>
        </div>
        <div class="col ms-3 h1 border shadow rounded d-flex align-items-center justify-content-center" style="height: 100px">
            {{-- @include Books --}}
            <a href="{{ route('book.create') }}" class="text-decoration-none text-success fw-bold">
                <i class="fa-solid fa-book me-1"></i>Book
                {{ $books->count() }}
            </a>
        </div>
    </div>
</div>
@endsection
