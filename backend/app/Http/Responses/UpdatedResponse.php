<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

final class UpdatedResponse extends ApiResponse
{
    /**
     * constructor
     */
    public function __construct(
        string $message = 'Updated successfully.',
    ) {
        parent::__construct(
            message: $message,
            code: Response::HTTP_NO_CONTENT,
        );
    }
}
