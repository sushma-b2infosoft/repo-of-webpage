<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $total = Employee::count();
        $active = Employee::where('is_active', true)->count();

        // logged in employee tasks
        $tasks = Task::where('employee_id', Auth::id())
                     ->orderBy('scheduled_at','desc')
                     ->get();

        // today tasks (all employees)
        $todayTasks = Task::whereDate('scheduled_at', now()->toDateString())->get();

        return view('dashboard.index', compact('total','active','tasks','todayTasks'));
    }
}

