<?php

namespace App\Http\Controllers\Projector;

use App\Client;
use App\Http\Requests\Adm\ProjectStoreRequest;
use App\Http\Requests\Adm\ProjectUpdateRequest;
use App\Project;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:projector-panel');
    }

    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);

        return view('projector.project.index', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        $clients = Client::all();

        return view('projector.project.create', compact('project', 'clients'));
    }

    public function store(ProjectStoreRequest $request)
    {
        Project::create($request->all());

        return redirect()->route('projector.projects.index')->with([
            'message' => 'Проект сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function edit(Project $project)
    {
        $clients = Client::all();

        return view('projector.project.edit', compact('project', 'clients'));
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('projector.projects.index')->with([
            'message' => 'Проект сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projector.projects.index')->with([
            'message' => 'Проект удален успешно',
            'alert-type' => 'success',
        ]);
    }

    public function confirmInitInfo()
    {
        $id = key(\Request::query());

        /* @var Project $project */
        $project = Project::findOrFail($id);
        $project->confirmDate('init_info_got_at', now());
        $project->saveOrFail();

        return back()->with([
            'message' => 'Получение исходных документов потверждено',
            'alert-type' => 'success',
        ]);
    }

    public function confirmIssued()
    {
        $id = key(\Request::query());

        /* @var Project $project */
        $project = Project::findOrFail($id);
        $project->confirmDate('issued_at', now());
        $project->saveOrFail();

        return back()->with([
            'message' => 'Выдача проекта потверждена',
            'alert-type' => 'success',
        ]);
    }

    public function confirmExpertisePassed()
    {
        $id = key(\Request::query());

        /* @var Project $project */
        $project = Project::findOrFail($id);
        $project->confirmDate('expertise_passed_at', now());
        $project->saveOrFail();

        return back()->with([
            'message' => 'Прохождение госстройэкспертизы потверждено',
            'alert-type' => 'success',
        ]);
    }
}
