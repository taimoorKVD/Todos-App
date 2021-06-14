@extends('layouts.app')
@section('title')
    Todos List
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-light">
                        <h3 class="card-title float-left">Todos</h3>
                        <a href="{{ route('todo.create') }}" class="btn btn-success btn-sm float-right">Create new todo</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if(!empty($todos))
                            @foreach($todos as $todo)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    @if(date('Y-m-d h:i', strtotime($todo->created_at)) == date('Y-m-d h:i'))
                                        <span class="badge badge-warning">New</span>
                                    @endif
                                    @if($todo->status == false)
                                        <a href="{{ route('todo.markAsCompleted', [ 'todo' => $todo->id ]) }}" class="btn btn-warning btn-sm float-right">Complete</a>
                                    @endif
                                    <a href="{{ route('todo.show', [ 'todo' => $todo->id ]) }}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item">No record found.</li>
                        @endif
                    </ul>
                </div>
                <div class="card-footer">
                    @if(!empty($todos))
                        {{ $todos->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
