<?php

class JsonResponseHelper
{
    public static function success($data, $message = null)
    {
        $response = [
            'success' => true,
            'data' => $data
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return json_encode($response);
    }

    public static function error($message, $data = null, $error = null)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if ($data) {
            $response['data'] = $data;
        }

        if ($error) {
            $response['errors'] = $error;
        }

        return json_encode($response);
    }
}
