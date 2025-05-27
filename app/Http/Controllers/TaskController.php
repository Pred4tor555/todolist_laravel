<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'integer'
        ]);

        $task = new Task($validated);
        $task->save();

        return redirect('/task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('task', [
            'task' => Task::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('task_edit', [
            'task' => Task::all()->where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'task' => 'required|max:255',
            'category_id' => 'integer'
        ]);

        $task = Task::all()->where( 'id', $id)->first();
        $task->title = $validated['title'];
        $task->category_id = $validated['category_id'];
        $task->save();

        return redirect('/task');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);
        return redirect('/task');
    }
}
