<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class ProjectController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = Task::where('project_id', $project->id)->orderBy('priority', 'asc')->get();
        return view('projects.show', ['tasks' => $tasks, 'project' => $project]);
    }

}
