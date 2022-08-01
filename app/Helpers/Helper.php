<?php

namespace App\Http\Helpers;

use GuzzleHttp\Psr7\Message;

function responseSuccess($data, $message, $statusCode)
{
    return response()->json(['success' => true, 'data' => $data, 'message' => $message], $statusCode);
}

function responseError($message, $statusCode)
{
    return response()->json(['success' => false, 'message' => $message], $statusCode);
}
