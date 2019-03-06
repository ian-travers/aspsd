<?php

namespace App\UseCases\Projects;


use App\Project;
use Illuminate\Http\Request;

class ProjectService
{
    public function addDocument(Project $project, Request $request): bool
    {
        $doc = $project->projectDocs()->make($request->all());

        return $doc->save();
    }
}