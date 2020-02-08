<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index()
    {
        $years = Project::getProjectsYears();

        $selectedYear = request('year') ?? Carbon::now()->year;

        $projects = request('term')
            ? Project::with('client')
                ->filter(request()->only('term'))
                ->sortable()
                ->paginate(10)
            : Project::with('client')
                ->year(['year' => $selectedYear])
                ->sortable()
                ->paginate(10);

        return view('frontend.project.index', compact('projects', 'years', 'selectedYear'));
    }

    public function show(Project $project)
    {
        $this->middleware('can:project-detail');

        return view('frontend.project.show', compact('project'));
    }
}
