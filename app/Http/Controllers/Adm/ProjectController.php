<?php

namespace App\Http\Controllers\Adm;

use App\Client;
use App\Http\Requests\Adm\ProjectStoreRequest;
use App\Http\Requests\Adm\ProjectUpdateRequest;
use App\Project;

class ProjectController extends AdmController
{
    public function index()
    {
        $years = Project::getProjectsYears();

        $selectedYear = request('year') ?? Project::getProjectsLastYear();

        $projects = request('term')
            ? Project::with('client')
                ->filter(request()->only('term'))
                ->sortable()
                ->paginate(10)
            : Project::with('client')
                ->year(['year' => $selectedYear])
                ->sortable()
                ->paginate(10);

        return view('adm.project.index', compact('projects', 'years', 'selectedYear'));
    }

    public function create()
    {
        $project = new Project();
        $clients = Client::all();

        return view('adm.project.create', compact('project', 'clients'));
    }

    public function store(ProjectStoreRequest $request)
    {
        Project::create($request->all());

        return redirect()->route('adm.projects.index')->with([
            'message' => 'Проект сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function edit(Project $project)
    {
        $clients = Client::all();

        return view('adm.project.edit', compact('project', 'clients'));
    }

    public function update(ProjectUpdateRequest $request, Project $project, $page = null)
    {
        $project->update($request->all());

        return redirect()->route('adm.projects.index')->with([
            'message' => 'Проект сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with([
            'message' => 'Проект удален успешно',
            'alert-type' => 'success',
        ]);
    }
}
