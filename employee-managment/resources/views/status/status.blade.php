@extends('layouts.app')

@section('content')
<div class="flex justify-center bg-gray-100 py-10">
    <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-lg">
        
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Enter Status</h2>

        <form action="{{ route('status.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- From and To inline -->
            <div class="flex items-center gap-4">
                <label class="w-16 font-medium text-gray-700">From</label>
                <input type="date" name="from" class="w-48 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <label class="w-8 font-medium text-gray-700 text-center">To</label>
                <input type="date" name="to" class="w-48 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Client -->
            <div class="flex items-center gap-4">
                <label class="w-16 font-medium text-gray-700">Client</label>
                <select name="client_id" class="w-96 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Client</option>
                    <option value="1">Client 1</option>
                    <option value="2">Client 2</option>
                </select>
            </div>

            <!-- Project -->
            <div class="flex items-center gap-4">
                <label class="w-16 font-medium text-gray-700">Project</label>
                <select name="project_id" class="w-96 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Project</option>
                    <option value="1">Project 1</option>
                    <option value="2">Project 2</option>
                </select>
            </div>

            <!-- Task -->
            <div class="flex items-center gap-4">
                <label class="w-16 font-medium text-gray-700">Task</label>
                <textarea name="task" class="w-96 border rounded-lg px-3 py-2 h-28 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white font-medium py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection




 

