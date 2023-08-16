<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        
        return view('welcome', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|min:3|unique:tasks',
        ]);

        Task::create($validated);

        return redirect('/')->with('success', 'Task created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show_task', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit_task', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'description' => 'required|string|min:3|max:100|unique:tasks',
        ]);

        $task->update($validated);

        return redirect('/')->with('success', 'Task Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        Alert::alert('Task Deleted', 'Deletion Operation was successful.');

        return redirect('/')->with('success', 'Task deleted');
    }
}
