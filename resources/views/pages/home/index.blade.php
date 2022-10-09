@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Home</h1>

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
            </div>
        </div>
    </div>
@endsection


@push('css')
    <style>
        .page-title{
            font-size: 4rem;
            color: #4fbf4b;
        }

    </style>
@endpush
