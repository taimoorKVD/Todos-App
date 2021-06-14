<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::orderBy('created_at', 'desc')->paginate(7));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:todos',
            'description' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('todos/create')
                ->withErrors($validator)
                ->withInput();
        }

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();

        return redirect()
            ->route('todo.index')
            ->with('message', 'Todo created successfully');
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:todos,name,'.$id,
            'description' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();

        return redirect()
            ->route('todo.show',['todo' => $id])
            ->with('message', 'Todo updated successfully');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()
            ->route('todo.index')
            ->with('message', 'Todo deleted successfully!');
    }
}
