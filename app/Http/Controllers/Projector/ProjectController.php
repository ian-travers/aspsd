<?php

namespace App\Http\Controllers\Projector;

use App\Client;
use App\Http\Requests\Adm\ProjectStoreRequest;
use App\Http\Requests\Adm\ProjectUpdateRequest;
use App\Http\Requests\ProjectDoc\DocRequest;
use App\Project;
use App\Http\Controllers\Controller;
use App\ProjectDoc;
use App\UseCases\Projects\ProjectService;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {

        $this->projectService = $projectService;
    }

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

        return view('projector.project.index', compact('projects', 'years', 'selectedYear'));
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
        if ($project->isDeletable()) {
            $project->delete();

            return redirect()->route('projector.projects.index')->with([
                'message' => 'Проект удален успешно',
                'alert-type' => 'success',
            ]);
        }

        return back()->with([
            'message' => 'Удаление этого проекта запрещено. Есть подтверждения по одному или нескольким срокам!',
            'alert-type' => 'warning',
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

    public function show(Project $project)
    {
        return view('projector.project.show', compact('project'));
    }

    // Project docs manage

    public function addDoc(Project $project)
    {
        $doc = new ProjectDoc();

        return view('doc.create', compact('project', 'doc'));
    }

    public function storeDoc(DocRequest $request)
    {
        $projectId = $request['project_id'];
        ProjectDoc::create($request->all());

        return redirect()->route('projector.projects.show', $projectId)->with([
            'message' => 'Документ сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function editDoc(Project $project, ProjectDoc $doc)
    {
        return view('doc.edit', compact('project', 'doc'));
    }

    public function updateDoc(DocRequest $request, ProjectDoc $doc)
    {
        $doc->update($request->all());

        return redirect()->route('projector.projects.show', $doc->project_id)->with([
            'message' => 'Документ сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function destroyDoc(Project $project, ProjectDoc $doc)
    {
        $doc->delete();

        return redirect()->route('projector.projects.show', $project)->with([
            'message' => 'Документ удален успешно',
            'alert-type' => 'success',
        ]);
    }
}
