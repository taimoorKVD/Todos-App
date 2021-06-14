@extends('layouts.app')

@section('title')
    Todo: {{ $todo->name }}
@endsection

@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <h3 class="text-center my-4">{{ $todo->name }} </h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light">
                    Details
                    <a href="{{ route('todo.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $todo->description }}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a href="{{ route('todo.edit', ['todo' => $todo->id]) }}" class="btn btn-warning btn-sm">Edit</a>&nbsp;
                    <a href="{{ route('todo.delete', ['todo' => $todo->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
