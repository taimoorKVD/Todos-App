@extends('layouts.app')

@section('title')
    Edit Todo: {{ $todo->name }}
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Edit Todo</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ $todo->name }}">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" cols="5" rows="5" name="description" style="resize: none;">{{ trim($todo->description) }}</textarea>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
