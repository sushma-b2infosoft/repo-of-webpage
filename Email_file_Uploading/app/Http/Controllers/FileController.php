<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Show upload form
    public function showForm()
    {
        return view('upload', ['path' => null]); // Blade file
    }

    // Handle file upload
    public function uploadFile(Request $request)
    {
        // 1️⃣ Validate file type & size
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // 2️⃣ Save file in public disk
        $path = $request->file('file')->store('uploads', 'public');
    return back()->with([
        'success' => 'File uploaded successfully!',
        'path' => asset('storage/' . $path)
    ]);
}
        
}


