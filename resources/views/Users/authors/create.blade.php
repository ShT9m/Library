@extends('layouts.app')

@section('title', 'Add Author')

@section('content')
<div class="row">
    <div class="col-9">
        <label for="add_author" class="h4 form-label d-block fw-bold">Authors</label>
        <form action="{{ route('author.store') }}"  method="post" enctype="multipart/form-data" class="d-flex">
            @csrf
            <input type="text" name="add_author" id="add_author" class="form-control" placeholder="add new author">&nbsp;
            <button type="submit" class="btn btn-success ms-3" style="width: 200px">
                <i class="fa-solid fa-plus"></i>Add
            </button>
        </form>
    </div>

    <div class="mt-3 col-9">
        <h1 class="h4 fw-bold">List of Authors</h1>
        <table class="table table-hover align-middle bg-light border">
            @foreach($all_authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td class="text-end me-0">
                        <button type="submit" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-author-{{ $author->id }}" title="Edit">
                            <i class="fa-solid fa-user-pen"></i>
                        </button>
                    </td>
                    <td class="text-end mx-auto">
                        <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-author-{{ $author->id }}" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                    @include('users.authors.modals.action')
                </tr>
            @endforeach
        </table>
        {{ $all_authors->links() }}
    </div>
</div>

@endsection
