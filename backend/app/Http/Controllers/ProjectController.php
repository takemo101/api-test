<?php

namespace App\Http\Controllers;

use App\Http\Responses\UpdatedResponse;
use App\Models\Project;
use App\Transformers\ProjectTransformer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::factory()->count(10)->create();

        foreach ($projects as $project) {
            $project->tasks()->createMany(
                \App\Models\ProjectTask::factory()->count(10)->make()->toArray()
            );
        }

        $projects = Project::query()->paginate(10);

        return fractal(
            $projects,
            new ProjectTransformer(),
        )->respond();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Project::query()->create([
            'name' => 'Project 1',
            'description' => 'Project 1 description',
        ]);

        return fractal(
            $project,
            new ProjectTransformer(),
        )->respond(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        return new UpdatedResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
