<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        // Enter Status page
        return view('status.status');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'client_id' => 'required',
            'project_id' => 'required',
            'task' => 'required',
        ]);

        // TODO: Database me save karna hai
         Status::create($request->all());

        return redirect()->route('status.index')->with('success', 'Status added successfully!');
    }
}


