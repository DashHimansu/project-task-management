<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the task with relation project to avoid N+1 query issue.
     */
    public function index(Request $request)
    {
        $query = Task::with('project');

        if ($request->project_id) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->assigned_to) {
            $query->where('assigned_to', $request->assigned_to);
        }

        $tasks = $query->get();
        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created task in db.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'required|string|max:255',
            'due_date' => 'required|date',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('attachment')) {
            $data['attachment'] =
                $request->file('attachment')->store('tasks', 'public');
        }

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
         $request->validate([
        'status' => 'required|in:pending,in_progress,completed',
    ]);

    $task->status = $request->status;
    $task->save();

    return back()->with('success', 'Status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete(); // soft delete
        return back()->with('success', 'Task deleted successfully!');
    }
    public function export()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
