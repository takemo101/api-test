<?php

namespace App\Transformers;

use App\Models\ProjectTask;
use App\Support\Fractal\AbstractAppTransformer;

class ProjectTaskTransformer extends AbstractAppTransformer
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
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
    public function transform(ProjectTask $task)
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'is_completed' => $task->is_completed,
        ];
    }
}
