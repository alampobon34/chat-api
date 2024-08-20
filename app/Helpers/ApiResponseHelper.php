<?php

namespace App\Helpers;

class ApiResponseHelper
{
    public static $DATA_FETCH_MESSAGE = 'Data Fetch Successfully';
    public static $INTERNAL_SERVER_ERROR = 'Inernal Server Error!';
    public static $DATA_NOT_INSERTED = 'Data Is Not Inserted!';
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function successResponse($status_code, $message = '', $data)
    {
        return response()->json([
            'statusCode' => $status_code,
            'message' => $message,
            'data' => $data
        ], $status_code);
    }

    public static function errorResponse($status_code, $message = '', $error)
    {
        return response()->json([
            'statusCode' => $status_code,
            'message' => $message,
            'errors' => $error
        ], $status_code);
    }
}
