<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    public function index()
    {
        // Fetch all projects
        $projects = Project::all();

        // Render dashboard view with CRUD options
        return view('dashboard', compact('projects'));
    }

    public function viewProjects()
    {
        // Fetch all projects and render view-only projects page
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    public function store(Request $request)
    {
        // Store a new project
        Project::create($request->only('name', 'description'));
        return back();
    }

    public function update(Request $request, Project $project)
    {
        // Update an existing project
        $project->update($request->only('name', 'description'));
        return back();
    }

    public function destroy(Project $project)
    {
        // Delete the project
        $project->delete();
        return back();
    }
    public function home()
    {
        $latestProjects = Project::latest()->take(3)->get();  // Get the last 3 projects
        return view('home', compact('latestProjects'));
    }
}
