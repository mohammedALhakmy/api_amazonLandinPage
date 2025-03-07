<?php

namespace App\Helpers;

class ApiResponse
{

    static function sendResponse($code = 200,$msg = null, $data = null)
    {
        //return response()->json([ 'status' => $code, 'msg' => $msg, 'data' => $data ]);
        $response = [
          'status' => $code,
          'msg' => $msg,
          'data' => $data
        ];
        return response()->json($response, $code);
    }

}
