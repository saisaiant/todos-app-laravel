<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoStoreRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }
    
    public function show(Todo $todo)
    {
        //$todo = Todo::findOrFail($todo);
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoStoreRequest $request)
    {

        $validatedData = $request->validated();
        $todo = Todo::create($validatedData);

        // $data = request()->all();

        // $todo = new Todo();
        // $todo->name = $data['name'];
        // $todo->description = $data['description'];
        // $todo->completed = false;
        // $todo->save();

        session()->flash('success', 'Todo created successfully');
        
        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        //$todo = Todo::findOrFail($todo);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoStoreRequest $request, Todo $todo)
    {
        //dd($request->name);
        $validatedData = $request->validated();
        $todo->Update($validatedData);
        session()->flash('success', 'Todo updated successfully');
        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Todo Completed successfully');

        return redirect('/todos');
    }
}
