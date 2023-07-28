<?php

namespace App\Http\Responses;

use Symfony\Component\HttpFoundation\Response;

final class ErrorResponse extends ApiResponse
{
    /**
     * constructor
     */
    public function __construct(
        string $message = 'error!',
        int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
    ) {
        parent::__construct(
            message: $message,
            code: $code,
        );
    }
}
