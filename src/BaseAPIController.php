<?php

namespace Yatilabs\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseAPIController extends Controller
{
    /**
     * Return a success response with data and optional message.
     *
     * @param  array|null  $data
     * @param  string|null  $message
     * @return JsonResponse
     */
    protected function sendSuccessResponse($data = null, $message = null): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message ?? 'Success',
        ];

        return response()->json($response);
    }

    /**
     * Return an error response with optional HTTP status code and message.
     *
     * @param  string|null  $message
     * @param  int  $statusCode
     * @return JsonResponse
     */
    protected function sendErrorResponse($message = null, $statusCode = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message ?? 'Error',
        ];

        return response()->json($response, $statusCode);
    }
}
