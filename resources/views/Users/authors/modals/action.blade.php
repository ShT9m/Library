{{-- Edit --}}
<div class="modal fade" id="edit-author-{{ $author->id }}">
    <div class="modal-dialog">
        <form action="{{ route('author.update', $author->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content border-warning">
                <div class="modal-header border-warning">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-pen-to-square"></i>Edit Author
                    </h3>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" placeholder="Author name" value={{ $author->name }}>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Delete --}}
<div class="modal fade" id="delete-author-{{ $author->id }}">
    <div class="modal-dialog">
        <form action="{{ route('author.destroy', $author->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-regular fa-trash-can"></i> Delete Author
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the author <span class="fw-bold">{{ $author->name }}</span>?</p>
                    <p class="fw-light">This action will affect the database.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
