<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();  // Get all todos from the database
        return view('todos.index', compact('todos'));  // Make sure the view path is correct
    }
    
    public function create(){
        return view('todos.create');

    }
    public function details(){
    
        return view('details')->with('todos', $todo);
    
    }
    
  // Show the edit form
public function edit($id)
{
    $todo = Todo::findOrFail($id);
    return view('todos.edit', compact('todo'));
}

// Handle the update request
public function update(Request $request, $id)
{
    // Validate the data
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    // Find the todo and update it
    $todo = Todo::findOrFail($id);
    $todo->name = $validated['name'];
    $todo->description = $validated['description'];
    $todo->save();

    session()->flash('success', 'Todo updated successfully.');

    return redirect()->route('todos.index');
}

public function delete($id) {
    $todo = Todo::findOrFail($id);  // Find the todo by ID
    $todo->delete();

    return redirect('/');
}

public function destroy($id)
{
    $todo = Todo::findOrFail($id);
    $todo->delete();

    session()->flash('success', 'Todo deleted successfully.');

    return redirect()->route('todos.index');
}


    public function store(Request $request)
{
    // Validate the data
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    // Create a new Todo
    $todo = new Todo();
    $todo->name = $validated['name'];
    $todo->description = $validated['description'];
    $todo->save();

    // Flash a success message
    session()->flash('success', 'Todo created successfully.');

    // Redirect to the index route (or wherever you want to display the todos)
    return redirect()->route('todos.index');
}

}
