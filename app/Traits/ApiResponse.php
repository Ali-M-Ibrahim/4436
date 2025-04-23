<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function sendResponse($data, $message, $code = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }
    public function sendError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
