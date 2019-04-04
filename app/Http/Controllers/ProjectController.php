<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->sortable()->paginate(10);

        return view('frontend.project.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->middleware('can:project-detail');

        return view('frontend.project.show', compact('project'));
    }
}
