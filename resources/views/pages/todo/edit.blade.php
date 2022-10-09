<form action="{{ route('todo.update',$task->id) }}"  method="post">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="title" value="{{ $task->title }}" type="text">
            </div>
        </div>
        <div class="col-lg-4 ">
            <button class="btn btn-success">Update</button>
        </div>
    </div>
    {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Edit</button>
    </div> --}}
</form>
