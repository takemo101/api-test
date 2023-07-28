<?php

namespace App\Support\Fractal;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;

abstract class AbstractAppTransformer extends TransformerAbstract
{
    /**
     * Create a new collection resource object.
     *
     * @param mixed                        $data
     * @param TransformerAbstract|callable $transformer
     */
    protected function collection($data, $transformer, ?string $resourceKey = AppApiSerializer::EmptyResourceKey): Collection
    {
        return new Collection($data, $transformer, $resourceKey);
    }
}
