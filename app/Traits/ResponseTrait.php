<?php

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Return a success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data = [], $message = 'Operation successful', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Return a failure response.
     *
     * @param string $message
     * @param int $statusCode
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function failureResponse($message = 'Operation failed', $statusCode = 400, $errors = [])
    {
        return response()->json([
            'status' => 'failure',
            'message' => $message,
            'errors' => $errors
        ], $statusCode);
    }
}
