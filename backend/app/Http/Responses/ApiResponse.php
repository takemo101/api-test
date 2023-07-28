<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

abstract class ApiResponse implements Responsable
{
    /**
     * constructor
     *
     * @param string $message
     * @param integer $code
     */
    public function __construct(
        public readonly string $message,
        public readonly int $code,
    ) {
        //
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return response()->json([
            'message' => $this->message,
            'status' => $this->code,
        ], $this->code);
    }
}
