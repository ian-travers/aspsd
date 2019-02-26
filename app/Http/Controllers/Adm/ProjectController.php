<?php

namespace App\Http\Controllers\Adm;

use App\Client;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);

        return view('adm.project.index', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $clients = Client::all();

        return view('adm.project.create', compact('project', 'clients'));
    }

    public function store(Request $request)
    {
        Project::create($request->all());

        return redirect()->route('adm.projects.index')->with([
            'message' => 'Проект сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Project $project)
    {
        $clients = Client::all();

        return view('adm.project.edit', compact('project', 'clients'));
    }

    public function update(Request $request, Project $project)
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

        return redirect()->route('adm.projects.index')->with([
            'message' => 'Проект удален успешно',
            'alert-type' => 'success',
        ]);
    }
}
