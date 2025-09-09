<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    public function index() {
        $tasks = Task::where('employee_id', Auth::id())->orderBy('scheduled_at','desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $r) {
        $data = $r->validate([
            'title'=>'required',
            'description'=>'nullable',
            'project_id'=>'nullable|exists:projects,id',
            'scheduled_at'=>'nullable|date'
        ]);

        $data['employee_id'] = Auth::id();
        Task::create($data);
        return redirect()->route('tasks.index')->with('success','Task added');
    }

    public function edit(Task $task) {
        $this->authorize('update', $task); // optional policy
        $projects = Project::all();
        return view('tasks.edit', compact('task','projects'));
    }

    public function update(Request $r, Task $task) {
        $data = $r->validate([
            'title'=>'required',
            'description'=>'nullable',
            'project_id'=>'nullable|exists:projects,id',
            'scheduled_at'=>'nullable|date',
            'status'=>'nullable|in:pending,done'
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success','Task updated');
    }

    public function destroy(Task $task) {
        $this->authorize('delete', $task); // optional
        $task->delete();
        return back()->with('success','Task deleted');
    }
}

