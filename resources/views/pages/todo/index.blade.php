@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Todo List</h1>
            </div>
            <div class="col-lg-12 text-center">
                <form action="{{ route('todo.store') }}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <input class="form-control" name="title" type="text">
                        </div>
                        <div class="col-lg-4 ">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5">
                <table class="table table-success table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task) {{--tasks should match with array name in TodoController response['tasks'] --}}
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td> {{--this should match with fillable --}}
                            {{-- <td>{{ $task->done }}</td> --}}

                            {{-- <input class="form-control w-auto" name="" type="text" value="{{ $task->title }}"> --}}

                            <td>
                                @if ($task->done==0)
                                    <span class="badge bg-warning">Not Completed</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif


                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa fa-trash-alt" ></i></a>
                                <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i class="fa fa-check-circle" ></i></a>
                                {{-- <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></a> --}}
                                {{-- <i class="fas fa-edit"></i>
                                <i class="fas fa-pencil-alt"></i> --}}
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-edit" onclick="taskEditModel({{ $task->id }})"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>


    </div>

    <div>


  <!-- Modal -->
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="taskEditContent">

            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit</button>
            </div> --}}
        </div>
    </div>
  </div>
    </div>

@endsection


@push('css') {{-- this should match with stack in style.blade.php --}}
    <style>
        .page-title{
            font-size: 4rem;
            color: #4fbf4b;
        }

    </style>
@endpush

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function taskEditModel(task_id) {

        var data = {
            task_id: task_id,
        };
        $.ajax({

            url:"{{ route('todo.edit') }}",
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },

            type:'GET',
            dataType: '',
            data: data,
            success: function(response) { // response is a return of edit.blade.php
                console.log(response);
                $('#taskEdit').modal('show');
                $('#taskEditContent').html(response);
            },
            error: function (error) {
                    console.log(`Error ${error}`);
                }
        });
    }

</script>

@endpush
