<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the Project.
     */
    public function index()
    {
        $projects = Project::withCount('tasks')->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new Project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created Project in db.
     */
    public function store(Request $request)
    {
        // Its a simple validation but We can apply form validation but i just keep it as simple
        $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified Project.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified Project in db.
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified project from db.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
