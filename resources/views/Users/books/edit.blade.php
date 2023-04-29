@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<div class="row">
    <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        {{-- Cover --}}
        <div class="form-group col-6">
            <label for="cover" class="form-label mb-0">Cover</label>
            <img src="{{ asset('storage/images/') }}" alt="{{ $book->cover }}" class="img-thumbnail">
            <input type="file" name="cover" id="cover" class="form-control" aria-describedby="image-info">
            <div id="image-info" class="form-text">
                The acceptable formats are jpeg, jpg, png, and gif only.<br>
                Max file size is 1048kB.
            </div>
            @error('image')
                <div class="text-danger small">{{ $message}}</div>
            @enderror
        </div>
        {{-- Title --}}
        <div class="form-group col-6 mt-3">
            <label for="title" class="form-label mb-0">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="{{ old('title', $book->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Year Published --}}
        <div class="form-group col-2 mt-3">
            <label for="yearPublished" class="form-label mb-0">Year Published</label>
            <input type="text" name="yearPublished" id="yearPublished" class="form-control" placeholder="{{ old('yearPublished', $book->yearPublished) }}">
        </div>
        {{-- Author --}}
        <div class="form-group col-4 mt-3">
            <label for="author" class="form-label mb-0">Author</label>
            <select name="author" id="author" class="form-control">
                @forelse ($all_authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @empty
                    You must add author first.
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-plus"></i>Save Changes</button>
    </form>
</div>
@endsection
