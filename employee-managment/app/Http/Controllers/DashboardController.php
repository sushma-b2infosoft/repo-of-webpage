<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = User::count();
        $activeEmployees = User::where('is_active', true)->count();
        // DashboardController
$tasks = Task::where('employee_id', auth()->id())->orderBy('task_date', 'desc')->get();

        $projects = Project::all();

        return view('dashboard', compact('totalEmployees','activeEmployees','tasks','projects'));
    }
}

