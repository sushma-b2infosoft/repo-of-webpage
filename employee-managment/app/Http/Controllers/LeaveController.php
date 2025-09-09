<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;


class LeaveController extends Controller
{
    public function index()
{
    $leaves = Leave::orderBy('from_date', 'desc')->get(); // Latest leaves first
    return view('leaves.leaves', compact('leaves'));
}

public function store(Request $request)
{
    $request->validate([
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
        'reason' => 'required|string|max:255',
    ]);

    Leave::create([
        'employee_name' => Auth::user()->name,
        'from_date' => $request->from_date,
        'to_date' => $request->to_date,
        'reason' => $request->reason,
    ]);

    return redirect()->route('leaves.index')->with('success', 'Leave added successfully.');
}

    }

