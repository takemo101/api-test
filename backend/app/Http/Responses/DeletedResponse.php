<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

final class DeletedResponse extends ApiResponse
{
    /**
     * constructor
     */
    public function __construct(
        string $message = 'Deleted successfully.',
    ) {
        parent::__construct(
            message: $message,
            code: Response::HTTP_NO_CONTENT,
        );
    }
}
