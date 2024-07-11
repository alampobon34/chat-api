<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function commonApiResponse($statusCode, $message, $data)
    {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function commonErrorResponse($statusCode, $message, $error)
    {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'error' => $error,
        ]);
    }
}
