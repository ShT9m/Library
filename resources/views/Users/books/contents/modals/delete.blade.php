<div class="modal fade" id="delete-book-{{ $book->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-header text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>Delete Book
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this book?</p>
                <div class="mt-3">
                    <img src="#" alt="" class="image-lg">
                    <p class="mt-1 text-muted">{{ $book->title }}</p>
                    <p class="mt-1 text-muted">by</p>
                    <p class="mt-1 text-muted">{{ $book->author->name }}</p>
                    <p class="mt-1 text-muted">published {{ $book->yearPublished }}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('book.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
