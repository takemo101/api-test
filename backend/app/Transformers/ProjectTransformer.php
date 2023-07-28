<?php

namespace App\Transformers;

use App\Models\Project;
use App\Support\Fractal\AbstractAppTransformer;
use League\Fractal\Resource\Collection;

class ProjectTransformer extends AbstractAppTransformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        'tasks',
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'name' => $project->name,
            'description' => $project->description,
        ];
    }

    /**
     * タスクリスト
     *
     * @param Project $project
     * @return Collection
     */
    public function includeTasks(Project $project): Collection
    {
        return $this->collection($project->tasks, new ProjectTaskTransformer());
    }
}
