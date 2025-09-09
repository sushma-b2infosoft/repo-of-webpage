<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'project_id'=>'required',
            'task_date'=>'required|date',
            'description'=>'required',
        ]);

        Task::create([
            'user_id'=>Auth::id(),
            'project_id'=>$request->project_id,
            'task_date'=>$request->task_date,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('success','Task added successfully');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $request->validate([
            'description'=>'required',
            'task_date'=>'required|date'
        ]);

        $task->update($request->all());
        return redirect()->route('dashboard')->with('success','Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->back()->with('success','Task deleted');
    }
}
